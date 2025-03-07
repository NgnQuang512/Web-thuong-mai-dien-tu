// const payOnlineInput = document.getElementById("payOnline");
// const payCodInput = document.getElementById("payCod");
// const payOnlineBox = document.querySelector(".payOnlineBox");
// const payForm = document.querySelector(".payForm");
// const payFormCod = document.querySelector(".payFormCod");
// payOnlineInput.addEventListener("change", () => {
//   if (payOnlineInput.checked === true) {
//     showPayForm();
//     hidePayFormCod();
//   }
// });
// payCodInput.addEventListener("change", () => {
//   if (payCodInput.checked === true) {
//     hidePayForm();
//     showPayFormCod();
//   }
// });
// const showPayForm = () => {
//   payForm.innerHTML = `
//     <h3 class=" uppercase bg-[#efefef] p-[10px]">Loại thanh toán</h3>
//                              <br>
//                              <div class="payTypes flex flex-wrap gap-[10px]">
//                                  <div
//                                      class="payType border-[1px] border-solid border-[#d3d3d3] rounded-[8px] p-[4px]  w-[105px] h-[60px]">
//                                      <img class="w-[50px] mx-auto h-full object-cover" src="assets/uploads/img/momo_pay.png" alt="">
//                                  </div>
//                                  <div
//                                      class="payType border-[1px] border-solid border-[#d3d3d3] rounded-[8px] p-[4px]  w-[105px] h-[60px]">
//                                      <img class="w-[50px] mx-auto h-full object-cover" src="assets/uploads/img/atm_pay.png" alt="">
//                                  </div>
//                                  <div
//                                      class="payType border-[1px] border-solid border-[#d3d3d3] rounded-[8px] p-[4px]  w-[105px] h-[60px]">
//                                      <img class="w-[60px] mx-auto mt-[15px] h-[18.64px] object-cover"
//                                          src="assets/uploads/img/vietQr_pay.png" alt="">
//                                  </div>
//                              </div>`;
//   const payTypes = document.querySelectorAll(".payType");
//   // Highlight effect
//   payTypes.forEach((payType) => {
//     payType.addEventListener("click", () => {
//       payTypes.forEach((el) => {
//         el.classList.remove("highLight");
//       });
//       payType.classList.add("highLight");
//     });
//   });
// };
// const showPayFormCod = () => {
//   payFormCod.innerHTML = `
//         <div class="">
//             <label for="address">Địa chỉ nhận hàng:</label>
//             <input type="text" value="HaNoi, Nam Tu Liem" id="address"
//                 class="rounded-[10px] p-[5px] border-[#d3d3d3] border-[1px] border-solid">
//         </div>
//         <div class="">
//             <label for="phone">Số điện thoại:</label>
//             <input type="number" value="012345689" id="phone"
//                 class="rounded-[10px] p-[5px] border-[#d3d3d3] border-[1px] border-solid">
//         </div>
//   `;
// };
// const hidePayFormCod = () => {
//   payFormCod.innerHTML = "";
// };
// const hidePayForm = () => {
//   payForm.innerHTML = "";
// };
