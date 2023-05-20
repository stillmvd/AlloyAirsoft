$document.ready(() => {
for (let i = 1; i <= parseInt($('#getCountPlayers').text()); i++) {
    for (let y = 0; y < parseInt($('#getCountAchievements').text()); y++) {
      $('#change100' + i + y).on('change', function() {
        $('form[name="getAchievements100' + i + '"]').on('submit');
      });
    }
  }
})