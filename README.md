# Comandos a correr
composer install

php bin/console lexik:jwt:generate-keypair

Crear archivo .env.local:

LDAP_DEFAULT_PORT=
LDAP_DEFAULT_HOST=
LDAP_DEFAULT_BASE_DN=


# Base de datos
/250129_dump.sql