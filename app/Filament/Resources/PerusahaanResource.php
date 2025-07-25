<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerusahaanResource\Pages;
use App\Filament\Resources\PerusahaanResource\RelationManagers;
use App\Models\Perusahaan;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   public static function form(Form $form): Form
   {
        return $form ->schema([
            TextInput::make('nama')->required(),
            Textarea::make('deskripsi')->rows(5)->required(),
            TextInput::make('alamat')->required(),
            TextInput::make('email')->email(),
            TextInput::make('telepon'),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('email')->label('Email')->sortable(),
                TextColumn::make('telepon')->label('Telepon'),
                TextColumn::make('alamat')->label('Alamat')->limit(30),
                TextColumn::make('deskripsi')->label('Profil')->limit(50)->wrap(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function canCreate(): bool
    {
        return \App\Models\Perusahaan::count() === 0;
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
            'index' => Pages\ListPerusahaans::route('/'),
            'create' => Pages\CreatePerusahaan::route('/create'),
            'edit' => Pages\EditPerusahaan::route('/{record}/edit'),
        ];
    }
}
