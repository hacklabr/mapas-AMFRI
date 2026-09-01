# Convenções de código — Mapa Cultural AMFRI

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## PHP

- Namespaces dos plugins/tema seguem o nome do diretório (ex.: `MapasAmfri`, `SamplePlugin`).
- Arquivos de configuração em `config.d/` devem retornar um array: `return [...];`.
- Use `env('VAR', default)` para valores sensíveis ou ambientais.
- Use `i::__('texto')` para strings visíveis ao usuário.

## Bash

- Scripts devem normalizar o diretório de execução:
  ```bash
  DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
  CDIR=$(pwd)
  cd "$DIR"
  # ... comando ...
  cd "$CDIR"
  ```
- Prefira `docker compose` (v2) em vez de `docker-compose`.

## Docker / Compose

- Serviços de produção devem usar `restart: unless-stopped`.
- Volumes persistentes mapeiam `./docker-data/<dir>:/var/www/<dir>`.
- Imagem base do Mapas Culturais deve ser fixada por tag, nunca `latest`.

## Front-end (tema)

- Assets compilados via pnpm/Laravel Mix usando `@mapas/scripts`.
- Comandos no diretório do tema:
  - `pnpm run dev` — build de desenvolvimento
  - `pnpm run build` — build de produção
  - `pnpm run watch` — watch mode

<!-- TODO: adicionar regras de linter/formatador quando configurados -->
