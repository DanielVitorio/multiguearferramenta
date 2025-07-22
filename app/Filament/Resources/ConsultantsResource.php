<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultantsResource\Pages;
use App\Filament\Resources\ConsultantsResource\RelationManagers;
use App\Models\Consultants;
use App\Models\RedirectedMachine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;

class ConsultantsResource extends Resource
{
    protected static ?string $model = Consultants::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel = 'Consultores HomeOffice';
    protected static ?string $pluralModelLabel = 'Consultores HomeOffice';
    protected static ?string $navigationGroup = 'Base HomeOffice';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->extraAttributes(['class' => 'bg-gray-50'])
                ->columns(3)
                ->schema([
                Select::make('machine_address')
                    ->label('Endereço de IP')
                    ->native(false)
                    ->searchable()
                    ->options(function () {
                        return RedirectedMachine::all()->pluck('address', 'address');
                    }),
                Forms\Components\TextInput::make('registration')
                    ->label('Matrícula')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('timetable')
                    ->label('Horário')
                    ->required()
                    ->maxLength(255),
                Select::make('shift')
                    ->options([
                        'MANHÃ' => 'MANHÃ',
                        'TARDE' => 'TARDE',
                        'NOITE' => 'NOITE',
                    ])
                    ->label('Turno')
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpf')
                    ->label('CPF')
                    ->required()
                    ->maxLength(255),
                Select::make('follow-up')
                    ->options([
                        'VOZ' => 'VOZ',
                        'DIGITAL' => 'DIGITAL',
                    ])
                    ->label('Seguimento')
                    ->required()
                    ->native(false),
                Select::make('added_user')
                    ->options([
                        'SIM' => 'SIM',
                        'NÂO' => 'NÂO',
                    ])
                    ->label('Usuário Adicionado?')
                    ->native(false)
                    ->default(null),
                    Select::make('status')
                    ->options([
                        'ATIVO' => 'ATIVO',
                        'FÉRIAS' => 'FÉRIAS',
                        'INSS' => 'INSS',
                        'DESATIVADO' => 'DESATIVADO',
                    ])
                    ->label('Status')
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('beginning')
                    ->label('Início')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('end')
                    ->label('Fim')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('local')
                    ->label('Local')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('supervisor')
                    ->label('Supervisor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('coordinator')
                    ->label('Coordenador')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('registration_tim')
                    ->label('Matrícula TIM')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pin')
                    ->label('PIN')
                    ->required()
                    ->maxLength(255),
            ])
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
                Tables\Columns\TextColumn::make('machine_address')
                    ->label('Endereço de IP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration')
                    ->label('Matrícula')
                    ->searchable(),
                Tables\Columns\TextColumn::make('timetable')
                    ->label('Horário')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shift')
                    ->label('Turno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('follow-up')
                    ->label('Seguimento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('added_user')
                    ->label('Usuário Adicionado?')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('beginning')
                    ->label('Início')
                    ->searchable(),
                Tables\Columns\TextColumn::make('end')
                    ->label('Fim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('local')
                    ->label('Local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supervisor')
                    ->label('Supervisor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('coordinator')
                    ->label('Coordenador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_tim')
                    ->label('Matrícula TIM')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pin')
                    ->label('PIN')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label('Visualizar'),
                Tables\Actions\EditAction::make()
                ->label('Editar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->label('Apagar'),
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
            'index' => Pages\ListConsultants::route('/'),
            'create' => Pages\CreateConsultants::route('/create'),
            'edit' => Pages\EditConsultants::route('/{record}/edit'),
        ];
    }
}
