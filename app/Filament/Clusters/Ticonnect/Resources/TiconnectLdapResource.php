<?php

namespace App\Filament\Clusters\Ticonnect\Resources;

use App\Filament\Clusters\Ticonnect;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectLdapResource\Pages;
use App\Filament\Clusters\Ticonnect\Resources\TiconnectLdapResource\RelationManagers;
use App\Models\TiconnectLdap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class TiconnectLdapResource extends Resource
{
    protected static ?string $model = TiconnectLdap::class;

    protected static ?string $navigationIcon = 'directory';
    protected static ?string $modelLabel = 'Ldap';
    protected static ?string $pluralModelLabel = 'Ldap';
    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $cluster = Ticonnect::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")
                ->extraAttributes(['class' => 'bg-gray-50'])
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('server')
                        ->label('Servidor LDAP')
                        ->suffix(fn (callable $get) => $get('port') ? ':' . $get('port') : '') // pega o valor da porta e coloca no sufixo do servidor
                        ->required()
                        ->extraAttributes(['class' => 'has-tooltip']) // Adiciona classe personalizada
                        ->maxLength(255),                    
                    Forms\Components\TextInput::make('port')
                        ->prefix(fn (callable $get) => $get('server') ? $get('server') . ":" : '') // pega o valor do servidor e coloca no prefixofixo da porta
                        ->label('Porta LDAP')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('user_admin')
                        ->label('Usuário root')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('password_admin')
                        ->label('Senha root')
                        ->password()
                        ->required()
                        ->maxLength(255)
                        ->afterStateHydrated(fn ($component) => $component->state('')), //essa função faz com que o campo password sempre fique em branco ao carregar
                    Forms\Components\TextInput::make('domain_components')
                        ->label('Componentes do Domínio')
                        ->placeholder('ex: dc=youOganization,dc=com')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('filter')
                        ->label('Filtro')
                        ->hintIcon('heroicon-s-information-circle', tooltip: "O campo de filtro permite restringir o acesso ao sistema apenas aos usuários autorizados. Para filtrar usuários de um grupo específico, como o grupo 'TI', utilize o seguinte filtro: (memberOf=CN=TI,OU=TI,
                                    DC=youorganization,DC=com) Somente os usuários pertencentes a esse grupo terão permissão de acesso. Se desejar adicionar mais grupos, basta incluí-los no filtro. Por exemplo, para permitir acesso aos grupos 'TI' e 'Administration', utilize o seguinte filtro: (memberOf=CN=TI,OU=TI,DC=youvr,DC=local)(memberOf=CN=Administration,
                                    OU=Administration,DC=youorganization,DC=com)")
                        ->placeholder('ex: (memberOf=CN=TI,OU=TI,DC=youvr,DC=local)')
                        ->prefix('(|')
                        ->suffix(')')
                        ->required()
                        ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('server')
                    ->label('Servidor LDAP'),
                Tables\Columns\TextColumn::make('port')
                    ->label('Porta LDAP'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListTiconnectLdaps::route('/'),
            'edit' => Pages\EditTiconnectLdap::route('/{record}/edit'),
        ];
    }
}
