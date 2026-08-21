# ADR-0002 — Plugins de terceiros como submódulos Git

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** setup

## Contexto

O projeto precisa usar plugins mantidos externamente (ex.: `MultipleLocalAuth`, `Analytics`, `Zammad`) sem perder o controle de qual versão está em produção.

## Decisão

Adicionar plugins de terceiros como submódulos Git em `plugins/`, registrados em `.gitmodules`, e habilitá-los em `docker/common/config.d/plugins.php`. Plugins específicos do projeto continuam como diretórios comuns em `plugins/`.

## Consequências

- **Positivas:** versionamento independente de cada plugin; histórico de atualizações preservado no repo aglutinador.
- **Negativas:** todo CI/deploy precisa executar `git submodule update --init --recursive`; risco de submódulos desatualizados se não forem pinados a commits/tags.
