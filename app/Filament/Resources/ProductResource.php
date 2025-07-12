<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withSum('variants', 'stock');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Produk')
                    ->tabs([
                        Tab::make('Informasi Produk')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Produk')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->required(),
                                Forms\Components\TextInput::make('slug')
                                    ->dehydrated()
                                    // ->disabled()
                                    ->required()
                                    ->unique(Product::class, 'slug', ignoreRecord: true),
                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(5)
                                    ->required(),

                                Repeater::make('images')
                                    ->relationship('images')
                                    ->label('Gambar Produk')
                                    ->schema([
                                        FileUpload::make('image_path')
                                            ->label('Gambar')
                                            ->disk('public')
                                            ->directory('product-image')
                                            ->required()
                                            ->image(),
                                    ])
                                    ->columns(1)
                                    ->collapsible()
                                    ->createItemButtonLabel('Tambah Gambar'),
                                Forms\Components\FileUpload::make('thumnail_image')
                                    ->image()
                                    ->label('Thumnail Gambar')
                                    ->disk('public')
                                    ->directory('thumnail-image-product'),

                            ])
                            ->columns(2),
                            Tab::make('Variant')
                                ->schema([
                                    Repeater::make('variants')
                                    ->relationship()
                                    ->label('Variant')
                                    ->schema([
                                    Forms\Components\TextInput::make('size')
                                    ->label('Ukuran')
                                    ->required(),
                                    Forms\Components\TextInput::make('price')
                                    ->label('Harga')
                                    ->prefix('Rp ')
                                    ->mask(RawJs::make('$money($input)'))
                                    ->dehydrateStateUsing(fn($state) => (int) preg_replace('/[^0-9]/', '', $state ?? 0))
                                    ->required(),
                                    Forms\Components\TextInput::make('stock')
                                    ->label('Stok')
                                    ->numeric()
                                    ->required(),
                                    ])->columns(3)
                                ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumnail_image')
                ->width(100)
                ->height(100)
                    ,
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('variants_sum_stock')
                    ->label('Total Stock')
                    ->sortable(),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
