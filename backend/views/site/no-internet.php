<div class="right-center">
<svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M16.2427 5.75732C18.5858 8.10047 18.5858 11.8995 16.2427 14.2426M7.75734 14.2426C5.41419 11.8995 5.41419 8.10047 7.75734 5.75732M4.92869 17.0711C1.02345 13.1658 1.02345 6.8342 4.92869 2.92896M19.0713 2.92896C22.9765 6.8342 22.9765 13.1658 19.0713 17.0711M12 12C13.1045 12 14 11.1046 14 10C14 8.89543 13.1045 8 12 8C10.8954 8 9.99998 8.89543 9.99998 10C9.99998 11.1046 10.8954 12 12 12ZM12 12V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
 </svg>
  <p class="fs-2">
    <?= Yii::t('app', "Internet is not available") ?>
  </p>
</div>
<style>
  /* Custom CSS to position the element */
  .right-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
    text-align: center;
  }
</style>