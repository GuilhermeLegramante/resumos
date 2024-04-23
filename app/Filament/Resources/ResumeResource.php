<?php

namespace App\Filament\Resources;

use App\Filament\Forms\DisciplineForm;
use App\Filament\Resources\ResumeResource\Pages;
use App\Filament\Resources\ResumeResource\RelationManagers;
use App\Models\Resume;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $modelLabel = 'resumo';

    protected static ?string $pluralModelLabel = 'resumos';

    protected static ?string $slug = 'resumo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('discipline_id')
                    ->label('Disciplina')
                    ->columnSpanFull()
                    ->relationship('discipline', 'name')
                    ->required()
                    ->createOptionForm(DisciplineForm::form()),
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('note')
                    ->label('Anotação')
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('path')
                    ->label('Arquivo')
                    ->columnSpanFull()
                    ->previewable()
                    ->openable()
                    ->downloadable()
                    ->moveFiles()
                    ->imageEditor()
                    ->imageEditorEmptyFillColor('#000000')
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('discipline.name')
                    ->label('Disciplina')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('note')
                    ->label('Anotação')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('path')
                    ->label('Arquivo'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Editado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->groups([
                Group::make('discipline.name')
                    ->label('Disciplina')
                    ->collapsible(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageResumes::route('/'),
            'detalhes' => Pages\ViewResume::route('/{record}'),
        ];
    }
}
