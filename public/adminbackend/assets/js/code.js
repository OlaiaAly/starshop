$(function() {
  $(document).on('click', '#delete', function(e) {
      e.preventDefault();
      var link = $(this).attr("href");

      swal({
          title: "Tens a Certeza?",
          text: "Atenção: Uma vez deletado, este ficheiro não poderá ser recuperado!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              // Redirecionar para o link ou fazer uma requisição AJAX para deletar
              window.location.href = link;

              // Caso queira usar AJAX, pode fazer assim:
              /*
              $.ajax({
                  url: link,
                  type: 'DELETE', // ou 'POST' dependendo da implementação
                  success: function(response) {
                      swal("Poof! Seu Ficheiro foi Deletado", {
                          icon: "success",
                      });
                  },
                  error: function() {
                      swal("Erro ao deletar o ficheiro", {
                          icon: "error",
                      });
                  }
              });
              */
          } else {
              swal("Teu Ficheiro não foi deletado");
          }
      });
  });
});
