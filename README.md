Estudo sobre migrations do Doctrine 2
======================================

Possui enidades, configuração básica de conexão com banco (bootstrap) e interpretador CLI (bin/doctrine) para:

####Criação do banco: 

bin/ doctrine orm:schema-tool:create

[**Documentação CLI**](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/tools.html)


####Criação de migration: 
(configurações - bin/migrations.yml)
 
bin/ doctrine migrations:diff / migrations:migrate

[**Documentação Migrations**](http://docs.doctrine-project.org/projects/doctrine-migrations/en/latest/index.html)
