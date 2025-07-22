<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SendNotificationsResource\Pages;
use App\Filament\Resources\SendNotificationsResource\RelationManagers;
use App\Models\SendNotifications;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class SendNotificationsResource extends Resource
{
    protected static ?string $model = SendNotifications::class;

    // Define o ícone de navegação para este recurso
    protected static ?string $navigationIcon = 'heroicon-o-Bell';
    protected static ?int $navigationSort = 3; // esse valor serve para determinar a posicissão no menu

    // Define o rótulo singular e plural do modelo para exibição na interface
    protected static ?string $modelLabel = 'Notificações';
    protected static ?string $pluralModelLabel = 'Notificações';


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }//função para criar um badge onde aparece o numero de notificações no menu


     /**
     * Configura o formulário de criação e edição para o recurso.
     *
     * @param Form $form Instância do formulário.
     * @return Form Configuração do formulário.
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Shipping_type')
                    ->options([
                        'DEP' => 'Enviar Para Departamento',
                        'USER' => 'Enviar Para Usuário',
                        'SIT' => 'Enviar Para Site',
                        'ALL' => 'Enviar Para Todos',
                    ])
                    ->placeholder('Selecione o tipo de envio')
                    ->label('Tipo de Envio')
                    ->native(false)
                    ->required(),
                    Select::make('receiver')
                        ->options(function () {
                            // Recupera os registros dos usuários com a hierarquia 'ADM'
                            $receivers = User::where('hierarchy', 'ADM')->get();
                            
                            // Cria um array associativo com o ID como chave e a concatenação do nome e username como valor
                            return $receivers->pluck('name', 'id')->mapWithKeys(function ($name, $id) {
                                return [$id => $name . ' - ' . User::find($id)->username];
                            });
                    })
                    ->label('Enviar para')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->columnSpan(2)
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('message')
                    ->label('Mensagem')
                    ->columnSpan(2)
                    ->required()
                    ->toolbarButtons(['blockquote','bold','bulletList','codeBlock','h2','h3','italic','link','orderedList','redo','strike','underline','undo',]), // Ajuste os botões conforme necessário
                Forms\Components\FileUpload::make('file')
                ->label('Anexar arquivo')
                ->disk('public') // Define o disco onde os arquivos são armazenados
                ->directory('notifications'), // Define o diretório onde os arquivos são armazenados
            ]);
    }

    
    /**
     * Configura a tabela de listagem para o recurso.
     *
     * @param Table $table Instância da tabela.
     * @return Table Configuração da tabela.
     */
    public static function table(Table $table): Table
    { 
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->html()
                ->searchable()
                ->badge()
                ->formatStateUsing(function ($state, $record) {
                    // Obtém o ID do usuário autenticado
                    $currentUserId = Auth::id();
                    // Verifica se o status é igual ao ID do usuário atual
                    if ($record->receiver == $currentUserId) {
                        return '<span>Recebido</span>';
                    }
                    return '<span>Enviado</span>';
                })//essa função verifica se quem criou a notificação for o usuario autenticado aparecerá como enviado e se não aparecerá como recebido

                ->color(function ($state, $record) {
                    // Obtém o ID do usuário autenticado
                    $currentUserId = Auth::id();
                    // Verifica se o status é igual ao ID do usuário atual
                    if ($record->receiver == $currentUserId) {
                        return 'info';
                    }
                    return 'success';
                }),//essa função verifica se quem criou a notificação for o usuario autenticado a cor do briding fica em uma cor e se não ela fica em outra cor    
            Tables\Columns\TextColumn::make('sender')
                ->label('Enviado por')
                ->searchable(),
            Tables\Columns\TextColumn::make('receiver')
                ->label('Enviado para')
                ->searchable(),
            Tables\Columns\TextColumn::make('title')
                ->label('Título')
                ->searchable(),
            Tables\Columns\TextColumn::make('data')
                ->label('Data de Envio')
                ->searchable(),
        ])
        ->filters([
            // Filtros adicionais podem ser adicionados aqui
            
        ])
        ->actions([
            Tables\Actions\ViewAction::make()
                ->label('Visualizar')
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}

    /**
     * Define as relações do recurso, se houver.
     *
     * @return array Lista de relações.
     */
    public static function getRelations(): array
    {
        return [
            // Relações podem ser definidas aqui
        ];
    }

    /**
     * Define as páginas associadas ao recurso.
     *
     * @return array Lista de páginas.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSendNotifications::route('/'),
        ];
    }
}
