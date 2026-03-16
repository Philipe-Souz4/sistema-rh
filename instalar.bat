@echo off
echo ==========================================
echo Instalando Dependencias e Banco de Dados
echo ==========================================

echo.
echo 1. Instalando pacotes via Composer...
call composer install

echo.
echo 2. Rodando Migrations do Banco de Dados...
php yii migrate --interactive=0

echo.
echo 3. Limpando o Cache...
php yii cache/flush-all

echo.
echo ==========================================
echo Instalacao concluida com sucesso!
echo ==========================================
pause