<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\TiAdministration;
use App\Filament\Resources\ApprovedResource\Pages;
use App\Filament\Resources\ApprovedResource\RelationManagers;
use App\Models\Approved;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions\CreateAction;
use Filament\Pages\SubNavigationPosition;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Expr\List_;

class ApprovedResource extends Resource
{
    protected static ?string $model = Approved::class;
    protected static ?string $cluster = TiAdministration::class;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;

    //configurações de linguagem da pagina
    protected static ?string $navigationIcon = 'heroicon-o-check';
    protected static ?string $modelLabel = 'Acessos aprovados';
    protected static ?string $pluralModelLabel = 'Acessos aprovados';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('Data'),
                Forms\Components\TextInput::make('Name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('machine')
                    ->label('Localização')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('logged_in_user')
                    ->label('Usuário logado')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('Data')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('machine')
                    ->label('Usuário logado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logged_in_user')
                    ->label('Localização')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                
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
            'index' => Pages\ListApproveds::route('/'),
            'create' => Pages\CreateApproved::route('/create'),
            'edit' => Pages\EditApproved::route('/{record}/edit'),
            
        ];
        
    }

    public static function canCreate(): bool
   {
      return false;
   } //para remover o botão de criar
}
