<?
//***********************
//DESENVOLVIDO POR: Neo Games
//WEBSITE: PWShaiya
//VERSÃO: 1.0
//CONTATO: shaiyaneo@email.com
//WEBSITE CRIPTOGRAFADA !
//**********************************
if (basename($_SERVER["PHP_SELF"]) == "settings.php") {
        exit ("<script>location.href=\"index.html\"</script>");
}

/* CONEXÃO COM O BANCO DE DADOS (MSSQL) */

	define ("pwhost", "25.42.80.70"); // Endereço Host
	define ("pwuser", "sa"); // Usuário Servidor (Padrão: Shaiya)
	define ("pwsenha", "castelli*123"); // Senha Servidor (Padrão: Shaiya123)

/* CONFIGURAÇÕES DO SERVIDOR (Shaiya) */

	define ("sitename", "Shaiya BJP - A aventura come<?php echo '&ccedil;' ?>a aqui !"); // Título do site
	define ("gamename", "Shaiya BJP"); // Nome do servidor
	define ("epversion", "Episódio 5.4"); // Episódio do servidor
	define ("gamexp", "10x"); // Experiência do servidor

/* CONFIGURAÇÕES DO SITE */

	define ("linkforum", "forum/"); // Endereço do fórum
	define ("portsv", 30810); // Porta Servidor Game (Padrão: 30810)
	define ("toprank", 50); // Quantidade de jogadores para o TOP Ranking
	define ("vnoticias", 7); // Total de notícias a serem visualizadas (Padrão: 7)
	define ("veventos", 7); // Total de eventos a serem visualizados (Padrão: 7)
	define ("episode", 5); // Episódio do servidor (Importante)

/* CONFIGURAÇÕES - CADASTRO */

	define ("cadtext", "Ol&aacute; <b>visitante</b>,come&ccedil;e a jogar fazendo o cadastro abaixo, e desfrute das maiores novidades de nosso servidor privado."); // Texto a ser exibido na página de cadastro
	define ("cadpoint", 0); // Quantidade de Point(s) ao cadastrar
	define ("activecolunm", true); // True: Ativar Coluna - False: Desativar Coluna
	define ("colunmrow", "RowID"); // Não Mecher

/* CONFIGURAÇÕES - DOWNLOADS

	$downcliente = array("Cliente_Shaiya", "Cliente Eternity completo", "1GB", "http://..."); // Dados do cliente
	$downpatch = array("Launcher_Shaiya", "Caso possuir outro cliente de mesmo epísodio", "12MB", "http://..."); // Dados do patch
	$downutil = array("Orbit", "Utilitário para fazer download", "4MB", "http://www.orbitdownloader.com/download.htm");	// Dados do utilitário

/* CONFIGURAÇÕES - CONTATO

	$viaemail = ("shaiyaneo@email.com"); // Endereço de E-mail para contato
	$viamsn = ("5868054"); // Endereço de MSN para contato
	$viaskype = ("ShaiyaNEO"); // Endereço de Skype para contato

/* CONFIGURAÇÕES - LISTA DE SERVIDORES(SALAS)

	$server['text'][0] = "Shaiya NEO"; //Nome da sala (Exemplo: Titanium)
	$server['maxon'][0] = "1000"; //Maximo de players na sala

/*
	@ CONFIGURAÇÕES DO PAINEL;

	true => ATIVA UMA OPÇÃO;
	false => DESATIVA UMA OPÇÃO;
	2 => ACESSO ÀS PÁGINAS: GAMEMASTERS E ADMINISTRADORES
	3 => ACESSO ÀS PÁGINAS: APENAS ADMINISTRADORES
*/

/* PAINEL DE USUÁRIO */
	define ("habemail", true); // Mostrar Email na página "Minha Conta"

/* PAINEL DE GAME MASTER */
	define ("newsgm", true); // Habilitar "Gerenciar Notícias" no Painel de GameMaster (Padrão: true)
	define ("eventsgm", true); // Habilitar "Gerenciar Eventos" no Painel de GameMaster (Padrão: true)
	define ("gecaccgm", false); // Habilitar "Gerenciar Contas" no Painel de GameMaster (Padrão: false)
	define ("gecchargm", false); // Habilitar "Gerenciar Players" no Painel de GameMaster (Padrão: false)

/* PERMISSÕES PAINEL ADMINISTRATIVO */
	/* GEC. NOTÍCIAS */
	define ("gec_news", 2); // Página "Gerenciar Notícias" (Padrão: 2)
	define ("gec_events", 2); // Página "Gerenciar Eventos" (Padrão: 2)
	define ("add_news", 2); // Página "Adicionar Notícias" (Padrão: 2)
	define ("del_news", 2); // Página "Deletar Notícias" (Padrão: 2)
	define ("add_events", 2); // Página "Adicionar Eventos" (Padrão: 2)
	define ("del_events", 2); // Página "Deletar Eventos" (Padrão: 2)
	/* GEC. CONTAS */
	define ("gec_acc", 3); // Página "Gerenciar Contas" (Padrão: 3)
	define ("del_accs", 3); // Página "Deletar Contas" (Padrão: 3)
	define ("ban_accs", 3); // Página "Banir Contas" (Padrão: 3)



/* ARQUIVOS NECESSÁRIOS (Não Mecher) */

require_once("classes/mssql.class.php");
require_once("classes/functions.class.php");
define ("dev", "UG93ZXJ6aW5EZXY="); // Não mecher
define ("version", "MS4wLjE="); // Não mecher

$sql = new conexao();

?>
