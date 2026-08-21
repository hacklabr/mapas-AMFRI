# ADR-0004 — Configurações em camadas de arquivos PHP por ambiente

**Status:** aceito  
**Data:** 2026-08-21  
**Round:** setup

## Contexto

Dev, homologação e produção precisam de configurações distintas (autenticação, logs, cache, tema ativo). Essas configurações devem ser mantidas fora do core do Mapas Culturais.

## Decisão

Manter configurações em arquivos PHP que retornam arrays, organizados em camadas:

- `docker/common/config.d/` — compartilhado entre todos os ambientes
- `docker/production/config.d/` — exclusivo de produção
- `dev/config.d/` — overrides do ambiente de desenvolvimento

Cada arquivo retorna `return [...]`; o core faz merge posteriormente.

## Consequências

- **Positivas:** evita fork do core; facilita overrides por ambiente; segue a convenção do Mapas Culturais.
- **Negativas:** risco de drift entre ambientes se os arquivos não forem mantidos sincronizados; dificuldade de rastrear a origem de uma configuração final.
