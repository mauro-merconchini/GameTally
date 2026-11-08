using Microsoft.AspNetCore.Mvc;

namespace GameTally.Api.Controllers;

[ApiController]
[Route("[controller]")]
public class GamesController : ControllerBase
{
    [HttpGet]
    public ActionResult<IEnumerable<string>> GetGames()
    {
        return Ok(new List<string>
        {
            "Game1",
            "Game2",
            "Game3"
        });
    }
    
}