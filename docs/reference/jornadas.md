# Jornadas de usuário — Mapa Cultural AMFRI

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Públicos

- **Administrador da plataforma:** realiza deploy, atualiza versões, configura plugins/tema.
- **Desenvolvedor:** cria plugins/tema, testa localmente, sobe novas versões.
- **Gestor cultural (usuário final):** usa a plataforma Mapas Culturais via instância AMFRI.

## Jornadas

### J1 — Deploy de nova versão em produção

1. Administrador atualiza versões no repo (`docker-compose.yml`, `docker/Dockerfile`, submódulos).
2. CI builda e publica a imagem Docker.
3. Administrador roda `update.sh` no servidor de produção.
4. Validação pós-deploy.

<!-- TODO: detalhar passos, pontos de dor e decisões de UX -->

### J2 — Desenvolvimento de um novo plugin

1. Desenvolvedor copia `plugins/SamplePlugin`.
2. Ajusta namespace, habilita em `docker/common/plugins.php`.
3. Desenvolve e testa no ambiente local (`dev/start.sh`).
4. Abre PR para `develop`.

<!-- TODO: detalhar -->

### J3 — Configuração de tema

1. Desenvolvedor copia `themes/SampleTheme` ou adiciona via submodule.
2. Define tema ativo em `docker/common/0.main.php` / `dev/0.main.php`.
3. Compila assets (`pnpm install --recursive && pnpm run build`).

<!-- TODO: detalhar -->
