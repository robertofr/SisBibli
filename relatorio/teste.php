<?php  
include ("../conect/conecta.php");// Conecta ao banco de dados
include ("../conect/mysqlexecuta.php");// Executa a clausula SQL
include ("../include/erro.php");// Incluir Tratamento de erros
include("../mpdf/mpdf.php");

  class reportCliente extends mpdf{  

    // Atributos da classe  
    public $pdo  = null;  
    public $pdf  = null;
    public $css  = null;  
    public $titulo = null; 
 
    /*  
    * Construtor da classe  
    * @param $css  - Arquivo CSS  
    * @param $titulo - Título do relatório   
    */  
    public function __construct($css, $titulo) {  
      $this->pdo  = Conexao::getInstance();  
      $this->titulo = $titulo;  
      $this->setarCSS($css);  
    }
  
    /*  
    * Método para setar o conteúdo do arquivo CSS para o atributo css  
    * @param $file - Caminho para arquivo CSS  
    */  
    public function setarCSS($file){  
     if (file_exists($file)):  
       $this->css = file_get_contents($file);  
     else:  
       echo 'Arquivo inexistente!';  
     endif;  
    }  

    /*  
    * Método para montar o Cabeçalho do relatório em PDF  
    */  
    protected function getHeader(){  
       $data = date('j/m/Y');  
       $retorno = "<table class=\"tbl_header\" width=\"1000\">  
               <tr>  
                 <td align=\"left\">Biblioteca mPDF</td>  
                 <td align=\"right\">Gerado em: $data</td>  
               </tr>  
             </table>";  
       return $retorno;  
     }  

     /*  
     * Método para montar o Rodapé do relatório em PDF  
     */  
     protected function getFooter(){  
       $retorno = "<table class=\"tbl_footer\" width=\"1000\">  
               <tr>  
                 <td align=\"left\"><a href=''>devwilliam.blogspot.com</a></td>  
                 <td align=\"right\">Página: {PAGENO}</td>  
               </tr>  
             </table>";  
       return $retorno;  
     }  

    /*   
    * Método para construir a tabela em HTML com todos os dados  
    * Esse método também gera o conteúdo para o arquivo PDF  
    */  
    private function getTabela(){  
      $color  = false;  
      $retorno = "";  

      $retorno .= "<h2 style=\"text-align:center\">{$this->titulo}</h2>";  
      $retorno .= "<table border='1' width='1000' align='center'>  
           <tr class='header'>  
             <th>Aluno</td>  
             <th>Matricula</td>  
             <th>Livro</td>  
             <th>ISSN</td>  
             <th>Data Emprestimo</td>  
             <th>Data Devolução</td>  
           </tr>";  

      $select = mysql_query ("SELECT * FROM alufunprof, livro, emprestimo  
							WHERE emprestimo.idAluFunProf = alufunprof.idAluFunProf 
							AND emprestimo.idLivro = livro.idLivro
			");
	$linha = mysql_fetch_array($select);//atribui o array recebido a variavel $linha
      foreach ($this->pdo->query($select) as $linha):  
         $retorno .= ($color) ? "<tr>" : "<tr class=\"zebra\">";  
         $retorno .= "<td class='destaque'>{$reg['nome']}</td>";  
         $retorno .= "<td>{$reg['nome']}</td>";  
         $retorno .= "<td>{$reg['matricula']}</td>";  
         $retorno .= "<td>{$reg['titulo']}</td>";  
         $retorno .= "<td>{$reg['issn']}</td>";  
         $retorno .= "<td>{$reg['dataEmprestimo']}</td>";  
         $retorno .= "<td>{$reg['dataDevolucao']}</td>";   
       $retorno .= "<tr>";  
       $color = !$color;  
      endforeach;  

      $retorno .= "</table>";  
      return $retorno;  
    } 

    /*   
    * Método para construir o arquivo PDF  
    */  
    public function BuildPDF(){  
	$css = file_get_contents("../css/styleRelatotio.css");
     $this->pdf = new mPDF('utf-8', 'A4-L');  
     $this->pdf->WriteHTML($this->css, 1);  
     $this->pdf->SetHTMLHeader($this->getHeader());  
     $this->pdf->SetHTMLFooter($this->getFooter());  
     $this->pdf->WriteHTML($this->getTabela());   
    }   

    /*   
    * Método para exibir o arquivo PDF  
    * @param $name - Nome do arquivo se necessário grava-lo  
    */  
    public function Exibir($name = null) {  
     $this->pdf->Output($name, 'I');  
    }  
  }   