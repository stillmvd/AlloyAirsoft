for (let i = 1; i <= Number(document.getElementById('getCountPlayers')?.textContent); i++)
{
    for (let y = 0; y < Number(document.getElementById('getCountAchievements')?.textContent); y++)
    {
        document.getElementById(('change100' + i) + y).onchange = function()
        {
            document.forms["getAchievements100" + i].submit();
        }
    }
}
