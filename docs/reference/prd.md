# Product Requirements Document — Mapa Cultural AMFRI

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Visão geral

Repositório aglutinador do deploy da plataforma **Mapas Culturais** para a AMFRI, permitindo controle de versões das peças do sistema (core, plugins, tema, PostgreSQL/PostGIS, Redis, nginx).

## Requisitos funcionais

| ID | Descrição | Critério de aceite |
|---|---|---|
| RF-001 | Empacotar imagem base do Mapas Culturais com tema AMFRI, plugins e configurações em imagem Docker própria (`hacklab/mapas-amfri`) | CI builda imagem para tags `v*.*.*` |
| RF-002 | Habilitar/desabilitar plugins e definir namespace/configuração via `docker/common/config.d/plugins.php` | Plugin listado no arquivo aparece ativo no container |
| RF-003 | Fornecer ambiente de desenvolvimento local via Docker | `dev/start.sh` sobe a stack localmente |
| RF-004 | Suportar múltiplos ambientes (dev/homolog/prod) com camadas de configuração | `dev/`, `docker/common/`, `docker/production/` coexistem sem conflito |
| RF-005 | Emissão e renovação automatizada de certificados SSL via Let's Encrypt | `init-letsencrypt.sh` gera certificado válido |
| RF-006 | Backup diário do banco PostgreSQL/PostGIS e arquivos persistentes | `scripts/backup-day.sh` e `postgres-dump.sh` executam com sucesso |

## Requisitos não funcionais

| ID | Descrição | Critério de aceite |
|---|---|---|
| RNF-001 | Build reproduzível fixando imagem base `hacklab/mapasculturais:7.8.6` | `docker/Dockerfile` referencia tag fixa |
| RNF-002 | Disponibilidade dos serviços de produção | Todos os serviços usam `restart: unless-stopped` |
| RNF-003 | Segurança na borda | nginx nega PHP em `/files`, aplica rate limit, limita upload |
| RNF-004 | Isolamento de cache e sessões | Dois serviços Redis separados no `docker-compose.yml` |
| RNF-005 | Observabilidade | Logs configuráveis via Monolog e acessíveis via `logs.sh` |

## Fora de escopo

- Manter fork do core Mapas Culturais (o core vem da imagem base).
- Gerenciar infraestrutura de hospedagem fora do Docker Compose.

## Decisões vinculadas

- Ver `docs/reference/decisions/`.
