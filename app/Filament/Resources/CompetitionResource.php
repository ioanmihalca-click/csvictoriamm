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

                        // FileUpload optimizat conform Filament 3.x best practices
                        FileUpload::make('image_url')
                            ->label('Imagine competiție')
                            ->image()
                            ->disk('public')
                            ->directory('competition-images')
                            ->visibility('public')
                            ->moveFiles() // Mută fișierele în loc să le copieze
                            ->imageEditor() // Activează editorul de imagini
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                                null, // Free cropping
                            ])
                            ->maxSize(2048) // 2MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->uploadingMessage('Se încarcă imaginea...')
                            ->imagePreviewHeight('250')
                            ->loadingIndicatorPosition('center')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadProgressIndicatorPosition('left')
                            ->openable()
                            ->downloadable()
                            ->deletable()
                            ->columnSpanFull()
                            ->helperText('Formate acceptate: JPG, PNG, WebP. Mărimea maximă: 2MB.'),

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
                        Forms\Components\RichEditor::make('description')
                            ->label('Descriere')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'blockquote',
                            ])
                            ->columnSpanFull()
                            ->helperText('Descrierea detaliată a competiției'),

                        Forms\Components\RichEditor::make('results')
                            ->label('Rezultate')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'blockquote',
                            ])
                            ->columnSpanFull()
                            ->helperText('Rezultatele obținute în competiție'),

                        Forms\Components\RichEditor::make('team_composition')
                            ->label('Componența echipei')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->columnSpanFull()
                            ->helperText('Membrii echipei care au participat'),

                        Forms\Components\RichEditor::make('notes')
                            ->label('Note suplimentare')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                                'blockquote',
                            ])
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
                        $records->each(function ($record) {
                            $record->update(['is_active' => !$record->is_active]);
                        });
                    })
                    ->deselectRecordsAfterCompletion(),

                Tables\Actions\BulkAction::make('activate')
                    ->label('Activează')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['is_active' => true])))
                    ->deselectRecordsAfterCompletion(),

                Tables\Actions\BulkAction::make('deactivate')
                    ->label('Dezactivează')
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn(Collection $records) => $records->each(fn($record) => $record->update(['is_active' => false])))
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
