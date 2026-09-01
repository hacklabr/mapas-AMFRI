# Runbook — Resposta a incidentes em produção

> Criado em: 2026-08-21 · Última revisão: 2026-08-21
> Regra: doc desatualizado é corrigido ou marcado como obsoleto — nunca deixado apodrecendo em silêncio.

## Propósito

Coordenar a resposta a incidentes que afetem a disponibilidade ou integridade do Mapa Cultural AMFRI em produção.

## Pré-condições

- [ ] Canal de comunicação da equipe definido.
- [ ] Acesso SSH ao servidor de produção.
- [ ] Runbooks de deploy e rollback acessíveis.

## Procedimento

1. **Detectar:** identifique sintomas (monitoramento, alerta ou relato de usuário).
2. **Comunicar:** notifique a equipe no canal de incidentes.
3. **Avaliar:** verifique saúde dos containers (`docker compose ps`) e logs (`./logs.sh`).
4. **Mitigar:**
   - Se for regressão de deploy recente, execute o runbook de rollback.
   - Se for falha de serviço, tente reiniciar o container afetado.
   - Se for questão de infraestrutura (disco, rede), escale com a equipe de infra.
5. **Resolver:** aplique a correção definitiva em branch `develop`, teste e promova via release.
6. **Pós-incidente:** documente em `docs/reference/decisions/` se houver decisão técnica nova.

## Rollback deste runbook

- Não aplicável; este runbook é o ponto de entrada. Sub-runbooks (rollback, restart) têm seus próprios rollbacks.
