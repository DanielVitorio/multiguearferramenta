<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OverWarningResource\Pages;
use App\Filament\Resources\OverWarningResource\RelationManagers;
use App\Models\OverWarning;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class OverWarningResource extends Resource
{
    protected static ?string $model = OverWarning::class;

    protected static ?string $navigationIcon = 'heroicon-c-finger-print';
    protected static ?int $navigationSort = 1; // esse valor serve para determinar a posicissão no menu

    // Define o rótulo singular e plural do modelo para exibição na interface
    protected static ?string $modelLabel = 'Gestão Sobre Aviso';
    protected static ?string $pluralModelLabel = 'Gestão Sobre Aviso';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'date',
            'user',
            'beginning',
            'end',
            'local',
           'requesting',
        ];
    } //função para retornar o search global

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->label('Data')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->required(),
                Forms\Components\TimePicker::make('beginning')
                    ->label('Horário da Atribuição')
                    ->required()
                    ->withoutSeconds(),
                Forms\Components\TimePicker::make('end')
                    ->label('Horário de Fechamento')
                    ->required()
                    ->withoutSeconds(), // Remove os segundos
                Forms\Components\Select::make('local')
                    ->label('Local do Chamado')
                    ->native(false)
                    ->options([
                        'CHAT' => 'Chat',
                        'SOL' => 'Solviandesk',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('requesting')
                    ->label('Solicitante')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('motive')
                    ->label('Motivo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('solved')
                    ->native(false)
                    ->label('Situação')
                    ->options([
                        'Resolvido' => 'Resolvido',
                        'Fechado' => 'Fechado',
                        'Pendente' => 'Prendente',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('calling_id')
                    ->label('ID do Chamado/Chat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('observation')
                    ->columnSpan(2)
                    ->label('Observação')
                    ->toolbarButtons(['blockquote','bold','bulletList','codeBlock','h2','h3','italic','link','orderedList','redo','strike','underline','undo',]) // Ajuste os botões conforme necessário
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Plate')
                    ->label('Matricula')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->searchable(),
                Tables\Columns\TextColumn::make('beginning')
                    ->label('Atribuição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('end')
                    ->label('Fechamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('calling_id')
                    ->label('ID do Chamado/Chat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Criação')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                 Tables\Actions\ViewAction::make()
                ->label('Visualizar')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
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
            'index' => Pages\ListOverWarnings::route('/'),
        ];
    }
}
