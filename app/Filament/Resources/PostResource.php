<?php

// app/Filament/Resources/PostResource.php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\BadgeColumn;
use App\Services\SeoScoreService;
use App\Services\KeywordAnalyzer;
use App\Services\PostStatsTracker;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\PostResource\Pages\CreatePost;

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
                                ->helperText(fn($state) => strlen($state ?? '') . '/60 characters')
                                ->afterStateUpdated(function ($state, callable $set, $record) {
                                    $set('slug', Str::slug($state));
                                    // Trigger SEO analysis on title change
                                    if ($record && $record->exists) {
                                        $record->calculateSeoScore();
                                    }
                                }),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),
                            MarkdownEditor::make('body')
                                ->columnSpanFull()
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, $record) {
                                    // Trigger analysis on content change
                                    if ($record && $record->exists) {
                                        $record->calculateSeoScore();
                                        if ($record->focus_keyword) {
                                            $record->analyzeKeyword();
                                        }
                                    }
                                }),
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
                                ->helperText(fn($state) => strlen($state ?? '') . '/60 characters'),
                            Forms\Components\Textarea::make('meta.description')
                                ->label('Meta Description')
                                ->required()
                                ->maxLength(160)
                                ->rows(3)
                                ->reactive()
                                ->helperText(fn($state) => strlen($state ?? '') . '/160 characters'),
                            Forms\Components\TextInput::make('focus_keyword')
                                ->label('Focus Keyword')
                                ->helperText('Main keyword you want to rank for')
                                ->reactive()
                                ->afterStateUpdated(function ($state, $record) {
                                    if ($record && $record->exists && $state) {
                                        $record->analyzeKeyword($state);
                                    }
                                }),

                            // SEO Score Display
                            Section::make('SEO Analysis')
                                ->schema([
                                    Placeholder::make('seo_score_display')
                                        ->label('')
                                        ->content(function ($record) {
                                            if (!$record || !$record->exists) {
                                                return 'Save the post to see SEO analysis';
                                            }

                                            $analysis = $record->seo_analysis ?? $record->calculateSeoScore();
                                            $score = $analysis['score'] ?? $record->seo_score ?? 0;
                                            $level = $analysis['level'] ?? $record->seo_score_level;
                                            $color = $analysis['color'] ?? $record->seo_score_color;

                                            $html = '<div class="space-y-2">';
                                            $html .= '<div class="flex items-center gap-4">';

                                            // Score circle
                                            $bgClass = $score >= 80 ? 'bg-success-100' : ($score >= 60 ? 'bg-warning-100' : 'bg-danger-100');
                                            $textClass = $score >= 80 ? 'text-success-700' : ($score >= 60 ? 'text-warning-700' : 'text-danger-700');

                                            $html .= "<div class='w-16 h-16 rounded-full flex items-center justify-center {$bgClass} {$textClass} font-bold text-xl'>{$score}</div>";
                                            $html .= "<div><div class='font-semibold'>SEO Score</div><div class='text-sm text-gray-500'>{$level}</div></div>";
                                            $html .= '</div>';

                                            // Checklist
                                            if (isset($analysis['analysis'])) {
                                                $html .= '<div class="mt-4 space-y-1">';
                                                foreach ($analysis['analysis'] as $check) {
                                                    $icon = $check['passed'] ? '✓' : '✗';
                                                    $color = $check['passed'] ? 'text-success-600' : 'text-danger-600';
                                                    $html .= "<div class='{$color} text-sm'>{$icon} {$check['message']}</div>";
                                                }
                                                $html .= '</div>';
                                            }

                                            $html .= '</div>';
                                            return new \Illuminate\Support\HtmlString($html);
                                        }),
                                ])
                                ->collapsible()
                                ->collapsed(fn($record) => !$record || !$record->exists),

                            // Keyword Analysis
                            Section::make('Keyword Analysis')
                                ->schema([
                                    Placeholder::make('keyword_analysis_display')
                                        ->label('')
                                        ->content(function ($record) {
                                            if (!$record || !$record->exists || !$record->focus_keyword) {
                                                return 'Set a focus keyword to see analysis';
                                            }

                                            $analysis = $record->keyword_analysis;
                                            if (!$analysis) {
                                                return 'Analyzing...';
                                            }

                                            $density = $analysis['density'] ?? 0;
                                            $score = $analysis['score'] ?? 0;

                                            $html = '<div class="space-y-3">';

                                            // Density bar
                                            $html .= '<div>';
                                            $html .= "<div class='mb-1 text-sm font-medium'>Keyword Density: {$density}%</div>";
                                            $html .= '<div class="w-full h-2 bg-gray-200 rounded">';
                                            $densityColor = ($density >= 1.5 && $density <= 3.5) ? 'bg-success-500' : 'bg-warning-500';
                                            $html .= "<div class='{$densityColor} h-2 rounded' style='width: " . min(100, $density * 20) . "%'></div>";
                                            $html .= '</div>';
                                            $html .= '<div class="mt-1 text-xs text-gray-500">Optimal: 1.5% - 3.5%</div>';
                                            $html .= '</div>';

                                            // Placement checklist
                                            if (isset($analysis['analysis'])) {
                                                $html .= '<div class="space-y-1">';
                                                $checks = $analysis['analysis'];

                                                $placements = [
                                                    'in_title' => 'In Title',
                                                    'in_slug' => 'In URL',
                                                    'in_meta_description' => 'In Meta Description',
                                                    'in_first_paragraph' => 'In First Paragraph'
                                                ];

                                                foreach ($placements as $key => $label) {
                                                    if (isset($checks[$key])) {
                                                        $icon = $checks[$key]['found'] ? '✓' : '✗';
                                                        $color = $checks[$key]['found'] ? 'text-success-600' : 'text-danger-600';
                                                        $html .= "<div class='{$color} text-sm'>{$icon} {$label}</div>";
                                                    }
                                                }
                                                $html .= '</div>';
                                            }

                                            $html .= '</div>';
                                            return new \Illuminate\Support\HtmlString($html);
                                        }),
                                ])
                                ->collapsible()
                                ->collapsed(fn($record) => !$record || !$record->exists || !$record->focus_keyword),
                        ])->columnSpan(1),
                ]),

                // Statistics Section (only show on edit)
                Section::make('Post Statistics')
                    ->schema([
                        Grid::make(3)->schema([
                            Placeholder::make('views_stats')
                                ->label('Views')
                                ->content(function ($record) {
                                    if (!$record || !$record->exists) {
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
                                    if (!$record || !$record->exists) {
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
                                    if (!$record || !$record->exists) {
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
                    ->visible(fn($record) => $record && $record->exists)
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
                    ->tooltip(fn($record) => $record->title),
                TextColumn::make('seo_score')
                    ->label('SEO')
                    ->badge()
                    ->color(fn(int $state): string => match (true) {
                        $state >= 80 => 'success',
                        $state >= 60 => 'warning',
                        default => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('views_count')
                    ->label('Views')
                    ->formatStateUsing(fn($state) => $state > 1000 ?
                        number_format($state / 1000, 1) . 'K' :
                        $state)
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('focus_keyword')
                    ->label('Keyword')
                    ->searchable()
                    ->limit(15)
                    ->toggleable(),
                TextColumn::make('keyword_density')
                    ->label('Density')
                    ->formatStateUsing(fn($state) => $state ? $state . '%' : '-')
                    ->color(fn($state): string => match (true) {
                        $state >= 1.5 && $state <= 3.5 => 'success',
                        $state >= 1 && $state <= 4 => 'warning',
                        default => 'gray',
                    })
                    ->toggleable(),
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
                    ->url(fn($record) => route('blog.show', $record->slug))
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

    // After creating a post, calculate SEO score and reading time
    public static function afterCreate($record): void
    {
        $record->calculateSeoScore();
        if ($record->focus_keyword) {
            $record->analyzeKeyword();
        }

        // Calculate reading time
        $tracker = new PostStatsTracker();
        $tracker->calculateReadingTime($record);
    }

    // After updating a post, recalculate SEO score
    public static function afterSave($record): void
    {
        $record->calculateSeoScore();
        if ($record->focus_keyword) {
            $record->analyzeKeyword();
        }

        // Recalculate reading time
        $tracker = new PostStatsTracker();
        $tracker->calculateReadingTime($record);
    }
}
