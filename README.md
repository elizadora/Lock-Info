# LockInfo

CRUD desenvolvido em PHP no modelo MVC sem a utilização de banco de dados para o armazenamento dos dados cadastrados.

## Funcionamento

Para fazer o armazenamento temporário dos dados são utilizadas as SESSIONS do PHP. As SESSIONS são variáveis globais que ficam armazenadas no servidor e podem ser acessadas de qualquer página do site. Para que isso seja possível, é necessário que a página tenha a função `session_start()` no início do código. Nessa aplicação elas foram utilizadas como vetores, onde cada posição representa individualmente a informação de um atributo do objeto pessoa.

## Estrura

```php
$_SESSION['nome'][] = $this->m_pessoa->getNome();
$_SESSION['CPF'][] = $this->m_pessoa->getCPF();

```

Com essa estrutura as SESSIONS são preenchidas com os dados do objeto pessoa, e cada posição do vetor representa um atributo do objeto. Por exemplo, a posição 0 do vetor nome, representa o nome da pessoa que está na posição 0 do vetor CPF e assim por diante.
