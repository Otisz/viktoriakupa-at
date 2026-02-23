<?php

namespace App\Filament\Resources\Files;

use App\Filament\Resources\Files\Pages\ManageFiles;
use App\Models\File;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentArrowUp;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = 'Tartalmak';

    protected static ?string $modelLabel = 'Fájl';

    protected static ?string $pluralModelLabel = 'Fájlok';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                FileUpload::make('path')
                    ->label('Fájl')
                    ->disk('public')
                    ->directory('files')
                    ->visibility('public')
                    ->downloadable()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Név')
                    ->searchable(),
                TextColumn::make('path_url')
                    ->label('URL')
                    ->copyable()
                    ->copyMessage('URL vágólapra másolva')
                    ->copyMessageDuration(1500),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFiles::route('/'),
        ];
    }
}
