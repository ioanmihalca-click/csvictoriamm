<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerformanceAthleteResource\Pages;
use App\Filament\Resources\PerformanceAthleteResource\RelationManagers;
use App\Models\PerformanceAthlete;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerformanceAthleteResource extends Resource
{
    protected static ?string $model = PerformanceAthlete::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Conținut';

    protected static ?string $navigationLabel = 'Sportivi Performanță';

    protected static ?int $navigationSort = 4;

    protected static ?string $modelLabel = 'sportiv';

    protected static ?string $pluralModelLabel = 'sportivi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informații sportiv')
                    ->description('Detalii despre sportivul din grupa de performanță')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nume')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('photo_url')
                            ->label('Fotografie')
                            ->image()
                            ->disk('public')
                            ->directory('performance-athletes')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\Select::make('background_color')
                            ->label('Culoare fundal')
                            ->options([
                                'bg-blue-50' => 'Albastru deschis',
                                'bg-green-50' => 'Verde deschis',
                                'bg-pink-50' => 'Roz deschis',
                                'bg-yellow-50' => 'Galben deschis',
                                'bg-purple-50' => 'Mov deschis',
                                'bg-red-50' => 'Roșu deschis',
                            ])
                            ->default('bg-blue-50')
                            ->required()
                            ->native(false),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Forms\Components\Section::make('Setări')
                    ->description('Configurări pentru afișare')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activ')
                            ->default(true)
                            ->helperText('Sportivul va fi vizibil pe site')
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
                Tables\Columns\ImageColumn::make('photo_url')
                    ->label('Fotografie')
                    ->disk('public')
                    ->height(60)
                    ->width(60)
                    ->circular()
                    ->extraImgAttributes(['class' => 'object-cover'])
                    ->defaultImageUrl('/images/placeholder-athlete.jpg'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nume')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('background_color')
                    ->label('Culoare')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'bg-blue-50' => 'Albastru',
                        'bg-green-50' => 'Verde',
                        'bg-pink-50' => 'Roz',
                        'bg-yellow-50' => 'Galben',
                        'bg-purple-50' => 'Mov',
                        'bg-red-50' => 'Roșu',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'bg-blue-50' => 'info',
                        'bg-green-50' => 'success',
                        'bg-pink-50' => 'danger',
                        'bg-yellow-50' => 'warning',
                        'bg-purple-50' => 'primary',
                        'bg-red-50' => 'danger',
                        default => 'gray',
                    }),

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
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data creării')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Activ',
                        '0' => 'Inactiv',
                    ])
                    ->default('1'),

                Tables\Filters\SelectFilter::make('background_color')
                    ->label('Culoare fundal')
                    ->options([
                        'bg-blue-50' => 'Albastru deschis',
                        'bg-green-50' => 'Verde deschis',
                        'bg-pink-50' => 'Roz deschis',
                        'bg-yellow-50' => 'Galben deschis',
                        'bg-purple-50' => 'Mov deschis',
                        'bg-red-50' => 'Roșu deschis',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Șterge sportivul')
                    ->modalDescription('Ești sigur că vrei să ștergi acest sportiv? Această acțiune nu poate fi anulată.')
                    ->modalSubmitActionLabel('Da, șterge'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Șterge sportivii selectați')
                        ->modalDescription('Ești sigur că vrei să ștergi sportivii selectați? Această acțiune nu poate fi anulată.')
                        ->modalSubmitActionLabel('Da, șterge'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePerformanceAthletes::route('/'),
        ];
    }
}
