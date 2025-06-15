<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Competition;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompetitionResource\Pages;

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
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titlu')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location')
                            ->label('Locație')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date')
                            ->label('Data')
                            ->required(),
                        Forms\Components\FileUpload::make('image_url')
                            ->label('Imagine')
                            ->image()
                            ->directory('competition-images')
                            ->disk('public')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('details_url')
                            ->label('URL pentru detalii (opțional)')
                            ->url()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Conținut detaliat')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Descriere')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('results')
                            ->label('Rezultate')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('team_composition')
                            ->label('Componența echipei')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('notes')
                            ->label('Note suplimentare')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Setări')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Activ')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Ordine de afișare (opțional)')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Imagine')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titlu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Locație')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->date('d.m.Y')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Activ')
                    ->boolean(),
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
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activare')
                        ->label('Activare')
                        ->icon('heroicon-o-check')
                        ->action(fn(Builder $query) => $query->update(['is_active' => true])),
                    Tables\Actions\BulkAction::make('dezactivare')
                        ->label('Dezactivare')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->action(fn(Builder $query) => $query->update(['is_active' => false])),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
}
