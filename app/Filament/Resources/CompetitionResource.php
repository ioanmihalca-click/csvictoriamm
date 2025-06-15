<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Competition;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\CompetitionResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Carbon\Carbon;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationGroup = 'Conținut';

    protected static ?string $navigationLabel = 'Competiții';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informații de bază')
                    ->description('Informațiile principale despre competiție')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titlu')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, $set) => $set('title', ucfirst($state))),

                        Forms\Components\TextInput::make('location')
                            ->label('Locație')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-map-pin'),

                        Forms\Components\DatePicker::make('date')
                            ->label('Data competiției')
                            ->required()
                            ->displayFormat('d.m.Y')
                            ->format('Y-m-d')
                            ->native(false)
                            ->prefixIcon('heroicon-m-calendar-days'),

                        // Versiunea MINIMĂ și SIGURĂ - garantat funcțională
                        FileUpload::make('image_url')
                            ->label('Imagine competiție')
                            ->image()
                            ->disk('public')
                            ->directory('competition-images')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('details_url')
                            ->label('URL pentru detalii (opțional)')
                            ->url()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-m-link')
                            ->helperText('Link către informații suplimentare despre competiție'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Conținut detaliat')
                    ->description('Informații detaliate despre competiție')
                    ->schema([
                        // TipTap Editor cu suport Tailwind
                        \FilamentTiptapEditor\TiptapEditor::make('description')
                            ->label('Descriere')
                            ->profile('simple')
                            ->tools([
                                'bold',
                                'italic',
                                'small',
                                'underline',
                                'strike',
                                'superscript',
                                'subscript',
                                'lead',
                                'heading',
                                'bullet-list',
                                'ordered-list',
                                'checked-list',
                                'blockquote',
                                'hr',
                                'link',
                                'media',
                            ])
                            ->placeholder('Introduceți descrierea competiției...')
                            ->maxContentWidth('full')
                            ->columnSpanFull()
                            ->extraInputAttributes([
                                'style' => 'min-height: 200px;'
                            ])
                            ->helperText('Editorul va aplica automat stilurile Tailwind corecte'),

                        \FilamentTiptapEditor\TiptapEditor::make('results')
                            ->label('Rezultate')
                            ->profile('simple')
                            ->tools([
                                'bold',
                                'italic',
                                'heading',
                                'bullet-list',
                                'ordered-list',
                                'blockquote',
                                'link',
                            ])
                            ->placeholder('Introduceți rezultatele competiției...')
                            ->maxContentWidth('full')
                            ->columnSpanFull()
                            ->helperText('Rezultatele vor fi formatate automat')
                            ->label('Rezultate')

                            ->columnSpanFull()
                            ->helperText('Rezultatele obținute în competiție')

                            ->extraInputAttributes([
                                'style' => 'min-height: 150px;'
                            ]),

                        Forms\Components\RichEditor::make('team_composition')
                            ->label('Componența echipei')

                            ->columnSpanFull()
                            ->helperText('Membrii echipei care au participat'),

                        Forms\Components\RichEditor::make('notes')
                            ->label('Note suplimentare')

                            ->columnSpanFull()
                            ->helperText('Alte informații relevante'),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Forms\Components\Section::make('Setări')
                    ->description('Configurări pentru afișare și organizare')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activ')
                            ->default(true)
                            ->helperText('Competiția va fi vizibilă pe site')
                            ->inline(false),

                        Forms\Components\TextInput::make('order')
                            ->label('Ordine de afișare')
                            ->numeric()
                            ->default(0)
                            ->step(1)
                            ->minValue(0)
                            ->maxValue(999)
                            ->helperText('Un număr mai mic înseamnă prioritate mai mare'),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Imagine')
                    ->disk('public')
                    ->height(60)
                    ->width(80)
                    ->extraImgAttributes(['class' => 'rounded-lg'])
                    ->defaultImageUrl('/images/placeholder-competition.jpg'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titlu')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->wrap(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Locație')
                    ->searchable()
                    ->icon('heroicon-m-map-pin')
                    ->iconColor('gray'),

                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->date('d.m.Y')
                    ->sortable()
                    ->icon('heroicon-m-calendar-days')
                    ->iconColor('primary'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Ordine')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data creării')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ultima actualizare')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Activ',
                        '0' => 'Inactiv',
                    ])
                    ->default('1'),

                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('date_from')
                            ->label('De la data'),
                        Forms\Components\DatePicker::make('date_until')
                            ->label('Până la data'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['date_from'], fn($q) => $q->whereDate('date', '>=', $data['date_from']))
                            ->when($data['date_until'], fn($q) => $q->whereDate('date', '<=', $data['date_until']));
                    }),
            ])
            ->filtersFormColumns(2)
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->color('info'),
                Tables\Actions\EditAction::make()
                    ->color('warning'),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Șterge competiția')
                    ->modalDescription('Ești sigur că vrei să ștergi această competiție? Această acțiune nu poate fi anulată.')
                    ->modalSubmitActionLabel('Da, șterge'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Șterge competițiile selectate')
                    ->modalDescription('Ești sigur că vrei să ștergi competițiile selectate? Această acțiune nu poate fi anulată.')
                    ->modalSubmitActionLabel('Da, șterge'),

                Tables\Actions\BulkAction::make('toggle_active')
                    ->label('Comută statusul')
                    ->icon('heroicon-o-arrow-path')
                    ->color('gray')
                    ->action(function (Collection $records) {
                        foreach ($records as $record) {
                            $record->update(['is_active' => !$record->is_active]);
                        }
                    })
                    ->deselectRecordsAfterCompletion(),

                Tables\Actions\BulkAction::make('activate')
                    ->label('Activează')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(function (Collection $records) {
                        foreach ($records as $record) {
                            $record->update(['is_active' => true]);
                        }
                    })
                    ->deselectRecordsAfterCompletion(),

                Tables\Actions\BulkAction::make('deactivate')
                    ->label('Dezactivează')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Collection $records) {
                        foreach ($records as $record) {
                            $record->update(['is_active' => false]);
                        }
                    })
                    ->deselectRecordsAfterCompletion(),
            ])
            ->emptyStateIcon('heroicon-o-trophy')
            ->emptyStateHeading('Nu există competiții')
            ->emptyStateDescription('Odată ce vei adăuga o competiție, aceasta va apărea aici.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Adaugă prima competiție'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Aici poți adăuga relații cu alte modele dacă este necesar
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),

            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_active', true)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}
