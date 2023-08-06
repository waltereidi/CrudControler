<h1>CrudController MVC </h1>

</br>
<p>MVC com injeção de dependencias , roteamento e gestor de entidades </br>
Bem simples , as entidades fazem apenas operações basicas de select , update e delete </br>
de um unico registro e permite executar queries customizadas</br>
A entidade herda uma classe padrão com timestamps e id </br>
e adiciona-se uma nova entidade com sua classe pai chamada EntidadeBase </br>
Através do roteamento pode-se encontrar todas as models e controllers e ainda </br>
enviar parametros na URL para chegar até o controller. </br>
O injetor de dependencias carrega o banco de dados configurado no arquivo </br>
config.json </br>
pode-se adicionar mais dependencias que são enviadas ao controller e depois para a model.
</p>
