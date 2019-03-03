# insider_cricket_trial

## Description

### Tools
This project is made on laravel 5.7 and PHP 7.2. 
The dependency manager used by by this project is
`composer`.

### Summary
This is a cricket simulation project. It consists of following
tournaments consist of matches between teams.

In this project, I have `seeded` an `IPL` tournament and under
that have registered eight teams. Each team has 11 players with
vaying skill set. All of the player information is saved in the
database.

### How to use
For running the project. 
1) You need to create an empty database
2) Import `insider_cricket_trial.sql` file
in that database. Currently, the sql file only has `migrations`
table.
3) After `cloning` the project inside your database, you will need
to run the following command: 

    `php artisan migrate -v` 
    
   This command will migrate all the table and their changes to
   the database.
4) For test purposes, I used seeder to insert data into the 
    database. The real data consists of 1 tournament, 8 teams,
    88 players manually entered, 4 matches among the teams. 
    Please use the following command to seed the database
    
    `php artisan db:seed`

    and for restarting the matches, use this
    
    `php artisan db:seed --class=RestartAllMatchesSeeder`
    
5) After this you need to run

    `php artisan serve`
    
    and you will be able to see the matches on the
    screen under the url 
    
    `localhost:8000/`
    
    the default tournament_id has been set to 1 which is IPL
    
6) Here you can press `Start Matches!!!` to see the simulation in 
    action and standings links is also there to see the 
    standings of the teams in the table. The standings of the tournament 
    table will update once the matches finish.


### Simulation Algorithm

The simulation algorith consists run every 5 seconds which is equal
to one minute. Now in this algorithm there is `bowling_rate` attribute
with every innings of the all the matches. This attribute
is varied when an event occurs like `dot ball`, `running`,`boundary`,
`wicket`, `extras`, `no event`. This `bowling_rate` attribute has 
a default value of `1.5` which means every 1 minute there is `1 ball`
taking place and in a particualr match. `Note: we have used floor`
function on the `bowling_rate` to get the whole number for balls.

Whenever a ball is bowled, the bowling_rate varies w.r.t to event
Suppose it was a `dot ball`, the 'bowling rate' would increase by
`0.1` making it closer to `2 balls per minute` for a particular match.
If a `six` is hit, the bowling_rate decreases by `0.1` which makes
the numbers of balls of bowled of a particular match close to least.

There are `five` main events used for the ball and then 
there are further `events` of that particular event. For example,
if a `boundary` has been randomly selected event, it will then see
if it is a `four` or a `six` and this will also be selected on
pure randomized function.

I wanted to add weights to the events, for example assigning more weight
to the most feasible event considering previos events. For example,
if the bowler is in the homeground and they need one last wicket to win.
The bowler will have more probability to get the wicket due to the 
biasnes of the wicket weight toward the home team on that scenario.
However, I was not able to implement it due to the lack of time.

### Architecture

The `MVC design pattern` has been used in this system. The simulation
function is called from the `RoundController@runSimulation` function
and it has many helper classes to under the `Http/Helpers` directory
to perform the functions of the simulation.

##### Note
I tried to make the simulation as fluent and correct as possible
with additional things like fall of wickets, extras, partnerships
etc. There is a use case when reached the simulation becomes buggy,
please try to be linient. I could have fixed that if I had more time.

###### Cheers
