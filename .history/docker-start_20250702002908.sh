echo "🚀 Démarrage du conteneur Symfony..."

echo "📦 Installation de Symfony Runtime..."
composer require symfony/runtime --no-interaction

echo "📦 Installation des dépendances..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "🗄️ Création du schéma de base de données..."
php bin/console doctrine:schema:create --no-interaction

echo "✅ Configuration terminée"
echo "🌐 Démarrage de l'application..."

# Démarrage selon votre environnement
exec "$@"