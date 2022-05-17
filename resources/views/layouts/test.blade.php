<style>
    .single-chart-half {
  width: 33%;
  justify-content: space-around ;
}

.circular-chart-half {
transform: rotate(-90deg);

  display: block;
  margin: 10px auto;
  max-height: 250px;
}

.circle-bg-half {
  fill: none;
  stroke: #eee;
  stroke-width: 3.8;
}

.circle-half {
  fill: none;
  stroke-width: 2.8;
  stroke-linecap: round;
  animation: progress 1s ease-out forwards;
  stroke: red;
}

.value {
  fill: #666;
  font-family: sans-serif;
  font-size: 8px;
  text-anchor: middle;

  transform: rotate(90deg); /* IE 9 */
}
.scale {
  fill: #666;
  font-family: sans-serif;
  font-size: 2px;
  text-anchor: middle;

  transform: rotate(90deg); /* IE 9 */
}
.unit {
  fill: #666;
  font-family: sans-serif;
  font-size: 3px;
  text-anchor: middle;

  transform: rotate(90deg); /* IE 9 */
}
</style>
<div class="single-chart-half">
    <svg viewBox="0 0 36 36" class="circular-chart-half">
      <path class="circle-bg-half"
	  stroke-dasharray="50, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <path class="circle-half"
        stroke-dasharray="20, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <text x="3" y="-14" class="scale">0%</text>
	  <text x="33" y="-14" class="scale">100%</text>
	  <text x="18" y="-21" class="value">30 </text>
	  <text x="18" y="-19" class="unit">gradzen </text>
    </svg>
  </div>

