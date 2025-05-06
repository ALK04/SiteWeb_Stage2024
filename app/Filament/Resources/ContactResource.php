<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use App\Models\formulaire_contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mail;
use App\Mail\ContactReply;

class ContactResource extends Resource
{
    protected static ?string $model = formulaire_contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                ->label('Nom')
                ->required(),

            Forms\Components\TextInput::make('prenom')
                ->label('Prénom')
                ->required(),

            Forms\Components\TextInput::make('tel')
                ->label('Téléphone')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Forms\Components\RichEditor::make('message')
                ->columnSpanFull()
                ->label('Message')
                ->required()
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

            Tables\Columns\TextColumn::make('nom')
            ->searchable()
            ->label('Nom'),

            Tables\Columns\TextColumn::make('prenom')
            ->searchable()
            ->label('Prénom'),
            Tables\Columns\TextColumn::make('tel')
            ->searchable()
            ->label('Telephone'),

            Tables\Columns\TextColumn::make('email')
            ->searchable()
            ->label('Email'),

            Tables\Columns\TextColumn::make('message')
            ->searchable()
            ->label('Message'),

            
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('reply')
                    ->label('Répondre')
                    ->icon('heroicon-o-envelope')
                    ->action(function (formulaire_contact $record, array $data) {
                        \Illuminate\Support\Facades\Mail::to($record->email)->send(new ContactReply($record->prenom, $record->nom, $data['reply_message']));
                    })
                    ->form([
                        Forms\Components\Textarea::make('reply_message')
                            ->label('Message de réponse')
                            ->required()
                    ])
                    ->modalHeading('Répondre au contact')
                    ->modalButton('Envoyer'),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
