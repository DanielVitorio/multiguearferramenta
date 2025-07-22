<?php

namespace App\Filament\Clusters\settings\Resources;

use App\Filament\Clusters\settings;
use App\Filament\Clusters\settings\Resources\ZabbixApiResource\Pages;
use App\Filament\Clusters\settings\Resources\ZabbixApiResource\RelationManagers;
use App\Models\ZabbixApi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use resources\svg;

class ZabbixApiResource extends Resource
{
    protected static ?string $model = ZabbixApi::class;

    protected static ?string $navigationIcon = 'icon-zabbix';

    protected static ?string $cluster = settings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('local')
                    ->label('Local')
                    ->required()
                    ->native(false)
                    ->options([
                        'YOUTILITY' => 'Youtility',
                        'CONTAX' => 'Contax'
                    ]),
                Forms\Components\TextInput::make('host')
                    ->label('Host')
                    ->prefix('http://')
                    ->suffix('/zabbix')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user')
                    ->label('Usuário Zabbix')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('local')
                    ->label('Local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('host')
                    ->label('Host')
                    ->prefix('http://')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user')
                    ->label('Usuário Zabbix')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListZabbixApis::route('/'),
            'edit' => Pages\EditZabbixApi::route('/{record}/edit'),
        ];
    }
}
