<?php

namespace App\Filament\Clusters\Ticonnect\Resources;

use App\Filament\Clusters\Ticonnect;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectAccessResource\Pages;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectAccessResource\RelationManagers;
use App\Models\TiconnectAccess;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiconnectAccessResource extends Resource
{
    protected static ?string $model = TiconnectAccess::class;

    protected static ?string $navigationIcon = 'access';
    protected static ?string $navigationLabel = 'Histórico de conexões';
    protected static ?string $modelLabel = 'Histórico de conexões';
    protected static ?string $pluralModelLabel = 'Histórico de conexões';
    protected static ?string $navigationGroup = 'Históricos';
    


    protected static ?string $cluster = Ticonnect::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user')
                    ->label('Usuário')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('logged_in_user')
                    ->label('Usuário Local')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Endereço Local')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('remote_user')
                    ->label('Usuário Remoto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('remote_address')
                    ->label('Endereço Remoto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('remote_session')
                    ->label('Sessão Espelhada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('connection_type')
                    ->label('Tipo de Conexão')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('date')
                    ->label('Data')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->label('Usuário')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logged_in_user')
                    ->label('Usuário Local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Endereço Local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remote_user')
                    ->label('Usuário Remoto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remote_address')
                    ->label('Endereço Remoto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remote_session')
                    ->label('Sessão Espelhada')
                    ->searchable(),
                Tables\Columns\TextColumn::make('connection_type')
                    ->label('Tipo de Conexão')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('data')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTiconnectAccesses::route('/'),
        ];
    }
}
