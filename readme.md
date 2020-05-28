it is recommended to modify these cases:

-php.ini(apache file):
uncomment -> extension = pdo_sqlite
uncomment -> extension = sqlite3

-config.php(project file):
change *SITE_URL* based on new location of the project folder related to htdocs

-.htaccess(project file):
change *RewriteBase* based on new location of the project folder related to htdocs

-insex.js(project file):
change *fetch function path argument* based on new location of the deletepost.php API related to htdocs