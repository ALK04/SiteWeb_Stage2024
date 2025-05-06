<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoPdfResource\Pages;
use App\Filament\Resources\InfoPdfResource\RelationManagers;
use App\Http\Controllers\GenerationPdfController;
use App\Models\info_pdf;
use App\Models\InfoPdf;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfoPdfResource extends Resource
{
    protected static ?string $model = info_pdf::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero')
                ->label('Numéro de SIREN')
                ->required(),

            Forms\Components\TextInput::make('immatriculation_RDC')
                ->label('Immatriculation RDC')
                ->required(),

            Forms\Components\DatePicker::make('date_immatriculation')
                ->label('Date de l\'immatriculation')
                ->required(),

            Forms\Components\TextInput::make('denomination_raison_sociale')
                ->label('Raison sociale')
                ->required(),

            Forms\Components\TextInput::make('forme_juridique')
                ->label('Forme juridique')
                ->required(),

            Forms\Components\TextInput::make('capital_social')
                ->label('Capital social')
                ->required(),

            Forms\Components\TextInput::make('adresse_siege')
                ->label('Adresse du siège social')
                ->required(),

            Forms\Components\TextInput::make('duree_personne_morale')
                ->label('Durée personne morale')
                ->required(),

            Forms\Components\DatePicker::make('date_cloture_exercice_social')
                ->label('Date clôture exercice social')
                ->required(),

            Forms\Components\TextInput::make('nom')
                ->label('Nom')
                ->required(),

            Forms\Components\TextInput::make('prenoms')
                ->label('Prénoms')
                ->required(),

            Forms\Components\DatePicker::make('date_naissance')
                ->label('Date de naissance')
                ->required(),

            Forms\Components\TextInput::make('lieu_naissance')
                ->label('Lieu de naissance')
                ->required(),

            Forms\Components\TextInput::make('nationalite')
                ->label('Nationalité')
                ->required(),

            Forms\Components\TextInput::make('domicile_personnel')
                ->label('Siège social')
                ->required(),

            Forms\Components\TextInput::make('adresse_etablissement')
                ->label('Adresse de l\'établissement')
                ->required(),

            Forms\Components\TextInput::make('nom_commercial')
                ->label('Nom commercial')
                ->required(),

            Forms\Components\Textarea::make('activites_exercees')
                ->label('Activité exercées')
                ->required(),

            Forms\Components\DatePicker::make('date_commencement_activite')
                ->label('Date du début de l\'activité')
                ->required(),

            Forms\Components\TextInput::make('origine_fonds_activite')
                ->label('Origine fonds activité')
                ->required(),

            Forms\Components\TextInput::make('mode_exploitation')
                ->label('Mode d\'exploitation')
                ->required(),

            Forms\Components\TextInput::make('devise')
                ->label('Devise')
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

            Tables\Columns\TextColumn::make('numero')
            ->searchable()
            ->label('Numero de SIREN'),

            Tables\Columns\TextColumn::make('immatriculation_RDC')
            ->searchable()
            ->label('Immatriculation RDC'),

            Tables\Columns\TextColumn::make('date_immatriculation')
            ->searchable()
            ->label('Date de l\'immatriculation'),

            Tables\Columns\TextColumn::make('denomination_raison_sociale')
            ->searchable()
            ->label('Raison sociale'),

            Tables\Columns\TextColumn::make('forme_juridique')
            ->searchable()
            ->label('Forme juridique'),

            Tables\Columns\TextColumn::make('capital_social')
            ->searchable()
            ->label('Capital social'),
            Tables\Columns\TextColumn::make('adresse_siege')
            ->searchable()
            ->label('Adresse du siege social'),

            Tables\Columns\TextColumn::make('duree_personne_morale')
            ->searchable()
            ->label('Durée personne morale'),

            Tables\Columns\TextColumn::make('date_cloture_exercice_social')
            ->searchable()
            ->label('Date cloture exercice social'),

            Tables\Columns\TextColumn::make('nom')
            ->searchable()
            ->label('Nom'),

            Tables\Columns\TextColumn::make('prenoms')
            ->searchable()
            ->label('Prénom'),

            Tables\Columns\TextColumn::make('date_naissance')
            ->searchable()
            ->label('Date de naissance'),

            Tables\Columns\TextColumn::make('lieu_naissance')
            ->searchable()
            ->label('Lieu de naissance'),

            Tables\Columns\TextColumn::make('nationalite')
            ->searchable()
            ->label('Nationalité'),

            Tables\Columns\TextColumn::make('domicile_personnel')
            ->searchable()
            ->label('Siège social'),

            Tables\Columns\TextColumn::make('adresse_etablissement')
            ->searchable()
            ->label('Adresse de l\'etablissement'),

            Tables\Columns\TextColumn::make('nom_commercial')
            ->searchable()
            ->label('Nom commercial'),

            Tables\Columns\TextColumn::make('activites_exercees')
            ->searchable()
            ->label('Activite exercées'),

            Tables\Columns\TextColumn::make('date_commencement_activite')
            ->searchable()
            ->label('Date du début de l\'activite'),

            Tables\Columns\TextColumn::make('origine_fonds_activite')
            ->searchable()
            ->label('Origine fonds activite'),

            Tables\Columns\TextColumn::make('mode_exploitation')
            ->searchable()
            ->label('Mode d\'exploitation'),
            Tables\Columns\TextColumn::make('devise')
            ->searchable()
            ->label('Devise'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('downloadPdf')
                ->label('Télécharger PDF')
                ->icon('heroicon-o-document-text')
                ->action(function ($record) {
                    return redirect()->route('download-pdf', ['id' => $record->id]);
                }),
                
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
            'index' => Pages\ListInfoPdfs::route('/'),
            'create' => Pages\CreateInfoPdf::route('/create'),
            'edit' => Pages\EditInfoPdf::route('/{record}/edit'),
        ];
    }
}
