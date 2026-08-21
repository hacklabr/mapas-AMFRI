# Arquitetura — Mapa Cultural AMFRI

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Visão geral

O repositório é um **aglutinador de deploy**: não contém o core do Mapas Culturais, mas empacota plugins, tema e configurações de infraestrutura sobre a imagem base `hacklab/mapasculturais`.

## Componentes

| Componente | Local | Responsabilidade |
|---|---|---|
| Core do Mapas Culturais | Imagem Docker base (`hacklab/mapasculturais:7.8.6`) | Aplicação PHP principal |
| Plugins locais | `plugins/` (ex.: `SamplePlugin`) | Extensões específicas da AMFRI |
| Plugins de terceiros | `plugins/` como submódulos Git (`.gitmodules`) | Plugins mantidos externamente, versionados independentemente |
| Tema do projeto | `themes/MapasAmfri` | Identidade visual e overrides de UI; estende `MapasCulturais\Themes\BaseV2\Theme` |
| Configurações comuns | `docker/common/config.d/` | Configurações compartilhadas entre ambientes |
| Configurações de produção | `docker/production/config.d/` | Configurações exclusivas de produção |
| Configurações de desenvolvimento | `dev/config.d/` | Overrides do ambiente local |
| Banco de dados | PostgreSQL/PostGIS (`postgis/postgis:16-master`) | Dados da plataforma |
| Cache | Redis | Cache de aplicação |
| Sessões | Redis | Sessões de usuário (serviço separado) |
| Proxy | nginx | Terminação TLS, proxy reverso, rate limiting, cache de assets |

## Fluxo de build

1. `git submodule update --init --recursive`
2. `docker build -f docker/Dockerfile .`
3. Dentro do container: `pnpm install --recursive && pnpm run build`
4. Imagem publicada no Docker Hub (`hacklab/mapas-amfri`).

## Fluxo de deploy

1. Atualizar versões no repo (`docker-compose.yml`, `docker/Dockerfile`, submódulos).
2. CI builda e publica a imagem Docker para a tag/branch.
3. No servidor de produção, executar `update.sh` (pull com submódulos, rebuild, restart).
4. Validação pós-deploy.

## Backup e recuperação

- Dump do PostgreSQL: `scripts/postgres-dump.sh`
- Backup diário/mensal: `scripts/backup-day.sh`, `scripts/backup-mon.sh`
- Backup de arquivos: `scripts/backup-files.sh`

## Modelo de branches

- `develop` — desenvolvimento e testes locais
- `master` — homologação
- Tags `vMAJOR.MINOR.PATCH` — produção

## Decisões técnicas registradas

- Ver `docs/reference/decisions/`.

## Runbooks

- `docs/reference/arquitetura/runbooks/deploy.md`
- `docs/reference/arquitetura/runbooks/rollback.md`
- `docs/reference/arquitetura/runbooks/incidentes.md`
