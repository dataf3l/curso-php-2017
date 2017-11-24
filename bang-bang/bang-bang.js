var current_player = 0; // 0,1
var bullet = {"x":0,"y":0};
var players = [{"x":0,"y":0},{"x":0,"y":0}];
var clock=0;
function board_width(){
	return 400;
}
function setup_players(){
	var w = board_width();

	players[0].x = Math.round(0.1*w+Math.random() * 0.2 * w); //leftish
	players[1].x = Math.round(w*0.6 + Math.random() * 0.2 * w); //rightish

}
function player_size(){
	return 28;
}
function ctx(){
	return document.getElementById("canvas").getContext("2d");
}
function img(x){
	return document.getElementById(x);
}
function blit(image_id,x,y){
	var c = ctx();
	var im = img(image_id);
	c.drawImage(im, x, y);
}
function draw_background(){
	blit("bg",0,0);
}
function baseline(){
	return board_width()*0.75;
}
function draw_players(){
	blit("cannon_l", players[0].x, baseline()-players[0].y-player_size());
	blit("cannon_r", players[1].x, baseline()-players[1].y-player_size());
}

function replicate(value, input){
	document.getElementById(input).value = value;
}
function tps(){
	return 10;
}
function gravity(){
	return 10;
}
function get_time_elapsed() {
	return clock;
}
function tick(){
	clock += 0.1; // time goes slowly
}
function reset_clock(){
	clock = 0;
}
function calculate_bullet_location(){
	var elapsed = get_time_elapsed();

	bullet.x = players[current_player].x + (elapsed * get_user_initial_speed() * Math.cos(get_user_angle())) * get_direction();
	bullet.y = players[current_player].y + (elapsed * get_user_initial_speed() * Math.sin(get_user_angle())) - Math.pow(gravity()/2 * elapsed,2);
	console.log(Math.round(elapsed,2) + ":" + Math.round(bullet.x,2) + "\t" + Math.round(bullet.y,2));
}
function deg2rad(deg){
	return deg * Math.PI/180;
}
function get_user_angle(){
	return deg2rad(parseFloat(document.getElementById("angle").value));
}
function get_user_initial_speed(){
	return parseFloat(document.getElementById("v0").value);
}
function get_direction(){ //left or right

	var d = [1,-1];
	return d[current_player];
}
function draw_bullet(){
	blit("bullet",bullet.x,  baseline() - bullet.y  - 20); // bullet height
	
}
function draw_world(){
	draw_background();
	draw_players();

	calculate_bullet_location();

	draw_bullet();

	tick();

	if(bullet.x < 0 || bullet.x > 400 || bullet.y < 0 || bullet.y > 400){
		//bullet left the stage, stop animating.
		//CHECK VICTORY
		// START NEXT TURN.
		reset_clock();
		next_turn();

	}else{
		setTimeout(draw_world, 1000 / 10);
	}
}
function next_turn(){
	current_player++;
	if(current_player == 2){
		current_player = 0;
	}
	draw_turn();

}

function fire(){
	reset_clock();
	console.log("speed=" + get_user_initial_speed());
	bullet.x = players[current_player].x ;
	bullet.y = players[current_player].y;
	
	draw_world();
}
function draw_turn(){
	var pl = ["LEFT","RIGHT"];
	document.getElementById("turn").innerHTML = "NEXT:" + pl[current_player];
}
function init(){
	setup_players();
	draw_background();
	draw_players();
	draw_turn();
}
