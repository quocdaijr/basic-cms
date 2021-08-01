<?php
# Env db
const ENV_DB_DSN = 'mysql:host=127.0.0.1;dbname=base_db;port=3306';
const ENV_DB_USERNAME = 'root';
const ENV_DB_PASSWORD = '12345@';
const ENV_DB_TABLE_PREFIX = 'bas_';
const ENV_DB_CHARSET = 'utf8mb4';

# env db audit
const ENV_DB_AUDIT_DSN = 'mysql:host=127.0.0.1;dbname=audit;port=3306';
const ENV_DB_AUDIT_USERNAME = 'root';
const ENV_DB_AUDIT_PASSWORD = '12345@';
const ENV_DB_AUDIT_TABLE_PREFIX = 'aud_';
const ENV_DB_AUDIT_CHARSET = 'utf8mb4';

#env mailer
const ENV_MAILER_TRANSPORT = [
    'class' => ENV_MAILER_TRANSPORT_CLASS,
    'host' => ENV_MAILER_TRANSPORT_HOST,
    'port' => ENV_MAILER_TRANSPORT_PORT,
    'username' => ENV_MAILER_TRANSPORT_USERNAME,
    'password' => ENV_MAILER_TRANSPORT_PASSWORD,
    'encryption' => ENV_MAILER_TRANSPORT_ENCRYPTION,
];

const ENV_MAILER_TRANSPORT_CLASS = 'Swift_SmtpTransport';
const ENV_MAILER_TRANSPORT_HOST = 'smtp.gmail.com';
const ENV_MAILER_TRANSPORT_PORT = '465';
const ENV_MAILER_TRANSPORT_ENCRYPTION = 'ssl';
const ENV_MAILER_TRANSPORT_USERNAME = 'quocdai271096@gmail.com';
const ENV_MAILER_TRANSPORT_PASSWORD = '0969113505';

# env
const ENV_COOKIE_VALIDATION_KEY = 'qqP7YmTvm3tfCK92uNx84ri7xstuFCWE';
const ENV_ADMIN_EMAIL = 'quocdai271096@gmail.com';
const ENV_SUPPORT_EMAIL = 'quocdai271096@gmail.com';
const ENV_SENDER_EMAIL = 'quocdai271096@gmail.com';
const ENV_SENDER_NAME = 'Basic Email';