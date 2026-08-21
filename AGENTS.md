# AGENTS.md — Mapa Cultural AMFRI

## 1. Contexto do projeto

Repositório aglutinador do deploy da plataforma **Mapas Culturais** para a AMFRI. Não contém o core do Mapas Culturais — ele vem da imagem base `hacklab/mapasculturais:7.8.6`. O repo empacota plugins (locais e submódulos), tema (`themes/MapasAmfri`), configurações Docker por ambiente e scripts de operação.

A fonte de verdade do produto é o PRD vivo em `docs/reference/prd.md`.

## 2. Comandos verificáveis

| Ação | Comando |
|---|---|
| Build da imagem Docker | `docker build -f docker/Dockerfile .` |
| Build de assets do tema | `cd themes/MapasAmfri && pnpm install --recursive && pnpm run build` |
| Subir ambiente de dev | `cd dev && ./start.sh` |
| Testes | <!-- TODO: preencher — não há suite de testes detectada --> |
| Lint | <!-- TODO: preencher — não há linter detectado --> |
| Typecheck | <!-- TODO: preencher — não há typechecker detectado --> |

Rode os comandos relevantes antes de declarar qualquer tarefa pronta.

## 3. Mapa da estrutura

- `docker/` — configurações Docker e imagem de produção (`Dockerfile`, `common/config.d`, `production/config.d`).
- `dev/` — scripts e configurações do ambiente de desenvolvimento local.
- `plugins/` — plugins locais (ex.: `SamplePlugin`) e submódulos de plugins de terceiros.
- `themes/MapasAmfri/` — tema filho de `BaseV2`, com assets compilados via pnpm/Laravel Mix.
- `scripts/` — scripts de backup (`backup-day.sh`, `backup-mon.sh`, `backup-files.sh`, `postgres-dump.sh`).
- `docker-compose.yml` — stack de produção/homologação (nginx, PHP-FPM, PostGIS, Redis cache, Redis sessões).
- `docker-compose.certbot.yml` — geração/renovação de certificado Let's Encrypt.
- `.github/workflows/ci.yml` — CI que builda e publica a imagem `hacklab/mapas-amfri` no Docker Hub.
- `docs/reference/` — documentação viva do produto (PRD, jornadas, arquitetura, ADRs).

## 4. Regras invioláveis

- Nunca commitar sem rodar os testes/comandos verificáveis relevantes.
- Nunca criar arquivos sem necessidade.
- Nunca editar migrations já aplicadas.
- Nunca adicionar dependências sem justificar.
- Nunca desativar checks de CI para fazer o build passar.
- Nunca usar `latest` na imagem base do Mapas Culturais.
- Sempre executar `git submodule update --init --recursive` após checkout/pull.

## 5. Convenções

As convenções vivem em `docs/reference/conventions/` (`code-style.md`, `git-workflow.md`, `api-design.md`). Leia antes de escrever código — este arquivo aponta, não duplica.

## 6. Workflow esperado

- Planeje antes de codar.
- Rode os comandos verificáveis antes de declarar pronto.
- Formato de commit e PR conforme `docs/reference/conventions/git-workflow.md`.
- Consulte `docs/reference/jornadas.md` antes de alterar fluxos de usuário.
- Consulte `docs/reference/arquitetura/INDEX.md` antes de alterar arquitetura ou integrações.

## 7. Ponteiros

- `docs/reference/prd.md` → produto e requisitos (fonte de verdade)
- `docs/reference/jornadas.md` → fluxos de usuário
- `docs/reference/arquitetura/INDEX.md` → fonte de verdade da arquitetura (índice roteador — carregue cada doc só quando relevante)
- `docs/reference/decisions/` → ADRs (registros de decisão técnica)
- `.agents/skills/` → catálogo de procedimentos sob demanda

## Skills — procedimentos sob demanda

Regras sempre ativas ficam neste arquivo; procedimentos vivem em `.agents/skills/`. Um procedimento só vira skill quando é repetível, multi-etapa ou de alto custo de erro — e não-óbvio (se qualquer agente acerta sem orientação, não precisa de skill).

**Evolução contínua:** quando uma decisão consolidada ou padrão recorrente emergir no dia a dia (ex.: arquitetura de módulos definida, convenção de widgets estabilizada), proponha uma skill usando `.agents/skills/exemplo-skill/SKILL.md` como formato — nunca crie sem aprovação explícita.

## ADRs são imutáveis

Decisão nova = ADR novo em `docs/reference/decisions/` (sequência de 4 dígitos a partir do máximo existente), que referencia o substituído. Nunca edite um ADR aceito; nunca renumere ADRs existentes. Formato: `docs/reference/decisions/0000-template-adr.md`.
