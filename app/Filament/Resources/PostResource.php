<?php

// app/Filament/Resources/PostResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Models\Post;
use App\Services\PostStatsTracker;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Blog';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(2)->schema([
                    Section::make('Content')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->reactive()
                                ->maxLength(60)
                                ->helperText(fn ($state) => strlen($state ?? '').'/60 characters')
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                            MarkdownEditor::make('body')
                                ->columnSpanFull()
                                ->required(),
                            Forms\Components\FileUpload::make('featured_image')
                                ->disk('public')
                                ->directory('blog-images')
                                ->required()
                                ->image()
                                ->maxSize(5120) // 5MB
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('1200:630') // Open Graph recommended
                                ->imageResizeTargetWidth('1200')
                                ->imageResizeTargetHeight('630'),
                            DatePicker::make('published_at')
                                ->required()
                                ->default(now()),
                        ])->columnSpan(1),

                    Section::make('SEO & Optimization')
                        ->schema([
                            Forms\Components\TextInput::make('meta.title')
                                ->label('Meta Title')
                                ->required()
                                ->maxLength(60)
                                ->reactive()
                                ->helperText(fn ($state) => strlen($state ?? '').'/60 characters'),
                            Forms\Components\Textarea::make('meta.description')
                                ->label('Meta Description')
                                ->required()
                                ->maxLength(160)
                                ->rows(3)
                                ->reactive()
                                ->helperText(fn ($state) => strlen($state ?? '').'/160 characters'),
                        ])->columnSpan(1),
                ]),

                // Statistics Section (only show on edit)
                Section::make('Post Statistics')
                    ->schema([
                        Grid::make(3)->schema([
                            Placeholder::make('views_stats')
                                ->label('Views')
                                ->content(function ($record) {
                                    if (! $record || ! $record->exists) {
                                        return '0';
                                    }

                                    return new \Illuminate\Support\HtmlString(
                                        "<div class='text-2xl font-bold'>{$record->formatted_views}</div>
                                        <div class='text-sm text-gray-500'>Total Views</div>"
                                    );
                                }),
                            Placeholder::make('shares_stats')
                                ->label('Shares')
                                ->content(function ($record) {
                                    if (! $record || ! $record->exists) {
                                        return '0';
                                    }
                                    $shares = $record->total_shares;

                                    return new \Illuminate\Support\HtmlString(
                                        "<div class='text-2xl font-bold'>{$shares}</div>
                                        <div class='text-sm text-gray-500'>Total Shares</div>"
                                    );
                                }),
                            Placeholder::make('reading_time_stats')
                                ->label('Reading Time')
                                ->content(function ($record) {
                                    if (! $record || ! $record->exists) {
                                        return '0 min';
                                    }
                                    $time = $record->reading_time ?? 0;

                                    return new \Illuminate\Support\HtmlString(
                                        "<div class='text-2xl font-bold'>{$time} min</div>
                                        <div class='text-sm text-gray-500'>Avg. Reading Time</div>"
                                    );
                                }),
                        ]),
                    ])
                    ->visible(fn ($record) => $record && $record->exists)
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->circular()
                    ->size(40),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->title),
                TextColumn::make('views_count')
                    ->label('Views')
                    ->formatStateUsing(fn ($state) => $state > 1000 ?
                        number_format($state / 1000, 1).'K' :
                        $state)
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('published_at')
                    ->dateTime('M j, Y')
                    ->sortable(),
                TextColumn::make('last_viewed_at')
                    ->label('Last Viewed')
                    ->dateTime('M j, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // ... (optional filters) ...
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view_on_site')
                    ->label('View')
                    ->icon('heroicon-o-link')
                    ->url(fn ($record) => route('blog.show', $record->slug))
                    ->openUrlInNewTab(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            // ... (optional relation managers for categories, tags, etc.) ...
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            // 'view' => ViewPost::route('/{record}'),
            // 'edit' => EditPost::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeFill(array $data): array
    {
        // Decode JSON string to array for meta
        $data['meta'] = json_decode($data['meta'], true);

        return $data;
    }

    // This method is called before the form fields are saved to the database
    public static function mutateFormDataBeforeSave(array $data): array
    {
        // Convert the meta array to a JSON string before saving
        $data['meta'] = json_encode(Arr::only($data['meta'], ['title', 'description']));

        return $data;
    }

    // After creating a post, calculate reading time
    public static function afterCreate($record): void
    {
        $tracker = new PostStatsTracker;
        $tracker->calculateReadingTime($record);
    }

    // After updating a post, recalculate reading time
    public static function afterSave($record): void
    {
        $tracker = new PostStatsTracker;
        $tracker->calculateReadingTime($record);
    }
}
