#!/bin/bash
echo "Instalando dependências..."
composer install

echo "Rodando migrations..."
php yii migrate --interactive=0

echo "Limpando cache..."
php yii cache/flush-all

echo "Pronto!"