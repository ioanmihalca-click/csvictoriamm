<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Gallery;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Services\CloudinaryService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\GalleryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GalleryResource\RelationManagers;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    protected static ?string $navigationLabel = 'Galerie';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Foto';
    protected static ?string $pluralModelLabel = 'Foto';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set, CloudinaryService $cloudinaryService) {
                        if ($state) {
                            $result = $cloudinaryService->uploadImage($state->getRealPath());
                            $set('photo_url', $result['secure_url']);
                        }
                    }),
                Forms\Components\TextInput::make('alt_text')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Hidden::make('photo_url'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_url'),
                Tables\Columns\TextColumn::make('alt_text'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Gallery $record, CloudinaryService $cloudinaryService) {
                        $publicId = $cloudinaryService->getPublicIdFromUrl($record->photo_url);
                        $cloudinaryService->deleteImage($publicId);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->after(function ($records, CloudinaryService $cloudinaryService) {
                        foreach ($records as $record) {
                            $publicId = $cloudinaryService->getPublicIdFromUrl($record->photo_url);
                            $cloudinaryService->deleteImage($publicId);
                        }
                    }),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}