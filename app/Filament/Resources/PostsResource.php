<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostsResource\Pages;
use App\Filament\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?int $navigationSort = 2; // esse valor serve para determinar a posicissão no menu
    protected static ?string $modelLabel = 'Blog';
    protected static ?string $pluralModelLabel = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
           ->schema([
                Section::make('Criar um Post')
                ->description('Criar um Novo Post de Aviso')
                ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('site')
                    ->options([
                        'YOUTILITY' => 'YOUTILITY',
                        'CONTAX' => 'CONTAX',
                        'TODOS' => 'TODOS',
                    ])
                    ->native(false)
                    ->columnSpan(1)
                    ->required()
                    ->label('Site'),
                Forms\Components\RichEditor::make('content')
                    ->label('Conteúdo')
                    ->columnSpan(2)
                    ->required()
                    ->toolbarButtons(['blockquote','bold','bulletList','h2','h3','italic','link','orderedList','codeBlock', 'strike','underline']) // Ajuste os botões conforme necessário
                    ->maxLength(3555),
                    
                ])
                ->columnSpan(2)
                ->columns(2),
                
                Section::make('Meta')
                ->schema([
                Forms\Components\FileUpload::make('image')
                    ->placeholder('Adicionar Imagem ')
                    ->extraAttributes(['style' => 'cursor: pointer;'])
                    ->label('Imagem')
                    ->directory('posts')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']), // Define os tipos de arquivo aceitos corretamente
                Forms\Components\TagsInput::make('tag')
                    ->label('Adicionar Tags')
                    ->default(null),
                Fieldset::make('settings')
                    ->label('Configuração')
                    ->schema([
                Forms\Components\Toggle::make('published')
                    ->label('Publicado')
                    ->default(true) // para já ficar selecionado de padrão
                    ->onColor('success'),
                Forms\Components\Toggle::make('notification')
                    ->label('Notificação Usuário')
                    ->onColor('success'),
                    ])
                    ->columns(1),
                ])
                ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordClasses(fn(Posts $record) => match($record->published){
                default => null,
                false => 'border-l-4 bg-danger-50 !border-l-danger-500 dark:bg-gray-800'
            })//para conseguir adicionar classes nas colunas
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->label('Criador')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site')
                    ->label('Site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->date()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('published')
                    ->label('Publicado')
                    ->onColor('success')
                    ->offColor('danger')
                    ->searchable(),
            ])
            ->filters([
                //TernaryFilter::make('published')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            InfolistSection::make([
                TextEntry::make('title')
                ->size('lg')
                ->weight('bold')
                ->hiddenLabel(),
            ImageEntry::make('image')
                ->view('post-image')
                ->hidden(fn ($record) => empty($record->image)), //serve
            TextEntry::make('content')
                ->html()
                ->hiddenLabel()
                ->alignJustify(),
            ])
            ->columnSpan(2),

            InfolistSection::make([
                Group::make([
                    TextEntry::make('created_at')
                    ->label('Publicado em')
                    ->date(),
                    TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->date(),
                    TextEntry::make('user')
                    ->label('Publicado por')
                    ->color('primary'),
                    IconEntry::make('published')
                    ->label('Publicado')
                    ->boolean(),
                    TextEntry::make('tag')
                    ->label('Tags')
                    ->separator(',')
                    ->badge()
                    ->color('primary')
                    ->columnSpan(2),
                ])->columns(2)
            ])
            ->columnSpan(1),
        ])
        ->columns(3);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePosts::route('/create'),
            'edit' => Pages\EditPosts::route('/{record}/edit'),
            'view' => Pages\ViewPosts::route('/{record}/cluster'), // Adiciona a rota de visualização
        ];
    }
}
