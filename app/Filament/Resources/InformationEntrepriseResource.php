<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformationEntrepriseResource\Pages;
use App\Filament\Resources\InformationEntrepriseResource\RelationManagers;
use App\Models\information;
use App\Models\InformationEntreprise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformationEntrepriseResource extends Resource
{
    protected static ?string $model = information::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('heure_achat')
                ->label('Heure d\'achat')
                ->required(),

            Forms\Components\TextInput::make('nom_entreprise')
                ->label('Nom de l\'entreprise')
                ->required(),

            Forms\Components\TextInput::make('email_acheteur')
                ->label('Email de l\'acheteur')
                ->email()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('heure_achat')
                ->searchable()
                ->label('Heure d\'achat'),

                Tables\Columns\TextColumn::make('nom_entreprise')
                ->searchable()
                ->label('Nom de l\'entreprise'),

                Tables\Columns\TextColumn::make('email_acheteur')
                ->searchable()
                ->label('Email de l\'acheteur'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInformationEntreprises::route('/'),
            'create' => Pages\CreateInformationEntreprise::route('/create'),
            'edit' => Pages\EditInformationEntreprise::route('/{record}/edit'),
        ];
    }
}
