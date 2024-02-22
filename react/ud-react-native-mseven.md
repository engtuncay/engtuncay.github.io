
- [B1 Giriş](#b1-giriş)
- [B2 Kurulumlar](#b2-kurulumlar)
  - [5. IOS İçin Gerekli Kurulumlar](#5-ios-i̇çin-gerekli-kurulumlar)
  - [6. Android İçin Gerekli Kurulumlar](#6-android-i̇çin-gerekli-kurulumlar)
  - [7. Android İçin Gerekli Kurulumlar (Windows)](#7-android-i̇çin-gerekli-kurulumlar-windows)
- [B4 Temel Bilgiler](#b4-temel-bilgiler)
  - [9. Emulator Ekranı Kontrolleri](#9-emulator-ekranı-kontrolleri)
  - [10. Projeyi Farklı Cihazlarda Çalıştırmak](#10-projeyi-farklı-cihazlarda-çalıştırmak)
  - [11. Uygulamayı Gerçek Cihaz Üzerinde Çalıştırmak (IOS)](#11-uygulamayı-gerçek-cihaz-üzerinde-çalıştırmak-ios)
  - [12. (Android) Uygulamayı Gerçek Cihaz Üzerinde Çalıştırmak](#12-android-uygulamayı-gerçek-cihaz-üzerinde-çalıştırmak)
- [B5 Stillendirme ve Flex ile Konumlandırma](#b5-stillendirme-ve-flex-ile-konumlandırma)
  - [13. Stillendirme](#13-stillendirme)
  - [14. flex](#14-flex)
  - [15. flexDirection](#15-flexdirection)
  - [16. justifyContent ve alignIstems](#16-justifycontent-ve-alignistems)
  - [17. justifyContent](#17-justifycontent)
  - [18. alignItems](#18-alignitems)
  - [19. Neden Pixel Cinsinden Yapmıyoruz?](#19-neden-pixel-cinsinden-yapmıyoruz)
  - [20. WebStorm Live Templates](#20-webstorm-live-templates)
- [B6 Component, Props ve State Tanımları](#b6-component-props-ve-state-tanımları)


# B1 Giriş

h1. Giriş
4 

2. Github Reposu
1 

3. Neden React Native
5 

4. Değerlendirme Hatırlatması
1 

# B2 Kurulumlar

## 5. IOS İçin Gerekli Kurulumlar

- iTerm2 terminali kullanılabilir (optional)

- homebrew kurulması gerekir. anasayfasındaki komut çalıştırılır.homebrew ile node ve watchman kurarız. (react native'in getting started dokümanından bakabiliriz.)

node 10'dan sonra react native sorun yaşandı, node 10 ve watchman'ı yüklemek için

```bash
brew install node@10 watchman

```

- react native cli kurmamız gerekir.

- ios account'a giriş yaparız ve command line tools xcode10.1 seçeriz.

1. Merhaba React Native!

- React-native uygulama oluşturmak

```bash
react-native init helloWorldProject

```

- belli bir versiyona göre kurmak için

```bash
react-native init helloWorldProject --version 0.59.8

```
- uygulamayı ayağa kaldırmak için

```bash
npm start

```

- cmd+r tuşu simulasyon ekranında güncelleme yapar



## 6. Android İçin Gerekli Kurulumlar

## 7. Android İçin Gerekli Kurulumlar (Windows)

- cmder alternatif command terminali

- chocolatey kurarız - kurulumları daha kolay yapmak için

-

# B4 Temel Bilgiler

## 9. Emulator Ekranı Kontrolleri
4 

## 10. Projeyi Farklı Cihazlarda Çalıştırmak
2 

## 11. Uygulamayı Gerçek Cihaz Üzerinde Çalıştırmak (IOS)
4 

## 12. (Android) Uygulamayı Gerçek Cihaz Üzerinde Çalıştırmak
3 

# B5 Stillendirme ve Flex ile Konumlandırma 

## 13. Stillendirme
8 

## 14. flex
5 

## 15. flexDirection
4 

## 16. justifyContent ve alignIstems
3 

## 17. justifyContent
2 

## 18. alignItems
2 

## 19. Neden Pixel Cinsinden Yapmıyoruz?
2 

## 20. WebStorm Live Templates
3 

# B6 Component, Props ve State Tanımları

21. Component (Bileşen) Nedir ?
4 

22. Props Nedir ?
5 

23. Event Çalıştırmak
1 

24. State Nedir ?
3 

25. State: 2
3 

26. Image
9 

27. TouchableOpacity
5 

28. TextInput - 1
10 

29. ScrollView
7 

30. FlatList - 1
5 

31. FlatList - 2
6 

32. FlatList - 3
4 

33. FlatList - 4
9 

34. Platform
5 

35. Projenin Oluşturulması
3 

36. Header Alanının Hazırlanması
5 

37. Login Alanı
5 

38. Login Alanı - 2
4 

39. Input Bileşeninin Hazırlanması
9 

40. Input Bileşeninin Hazırlanması - 2
2 

41. KeyboardAvoidingView
1 

42. Button Bileşeninin Hazırlanması
6 

43. Sign Up Alanı
3 

44. Uygulama İsmini Değiştirmek
4 

45. Uygulama Icon'u Belirlemek
11 

46. Splash Ekranı Hazırlamak
4 

47. Servis Çağrımı Yapmak
7 

48. Servis Çağrımı Yapmak - 2
2 

49. Async / Await
3 

50. FlatList Çalışması
7 

51. FlatList Çalışması 2 - ActivityIndicator
3 

52. FlatList Çalışması 3 - Filtreleme İşlemi
2 

53. FlatList Çalışması 4 - Sonsuz Scroll
14 

54. FlatList Çalışması 5 - Pull to Refresh
3 

55. Kurulum
6 

56. Yeni Sayfa Tanımlamak
2 

57. Sayfaları Farklı Dosyalarda Tanımlamak
2 

58. Yönlendirme İşleminin Yapılması
3 

59. Push Methodu
1 

60. goBack Methodu
1 

61. Route'lar için Parametre Göndermek
2 

62. Header Başlığını Değiştirmek
4 

63. Header Geri Butonu
2 

64. Header Stil Tanımları
2 

65. Header Başlık Yerine Icon Koymak
3 

66. Header'a Buton Eklemek
4 

67. Router Dosyasının Oluşturulması
1 

68. Modal Açtırmak
8 

69. Drawer Navigator
8 

70. Drawer Navigator Özelleştirmeleri
6 

71. Drawer Navigator Özelleştirmeleri - 2
2 

72. Drawer Navigator Menu Butonu
5 

73. Custom Drawer Menu Geliştirmek
7 

74. Tab Navigation
2 

75. Tab Navigation Oluşturmak
5 

76. Icon Kullanmak
4 

77. Stack Navigator ve Tab Navigator'un Birlikte Kullanımı
5 

78. Stack Navigation Detay Ekranını Tasarlamak
7 

79. Tab Navigation Modal Entegrasyonu
4 

80. Stil Özelleştirmeleri ve Material Tab Bar
2 

81. Tab Navigation ile Drawer Navigation'ı Birlikte Kullanmak
2 

82. Kurulum
5 

83. Image Picker
4 

84. Backend Üzerine Upload İşlemleri
8 

85. Yükleniyor İfadesinin Gösterilmesi
5 

86. Hata Kontrolü
3 

87. Kurulum
7 

88. Fotoğraf Çekmek
4 

89. Çekilen Fotoğrafı Galeriye Kaydetmek
5 

90. React Native Permissions - 1
5 

91. React Native Permissions - 2 (Check Permissions Multiple)
5 

92. React Native Permissions - 3 (notAuthorizedView)
8 

93. React Native Permissions - 4 (Open Settings)
1 

94. Stillendirme İşlemleri
3 

95. Sayaç Yapımı
2 

96. Çekilen Fotoğrafları Gerçek Zamanlı Olarak Göstermek
6 

97. Flash ve Kamera Modları
2 

98. Timing
8 

99. Timing - 2 (Start Callback)
2 

100. Translate Position
4 

101. Scale Transform
4 

102. Multi Animation Field
3 

103. Absolute Positions
3 

104. Interpolate
5 

105. Interpolate - 2
3 

106. Easing
4 

107. Spring
3 

108. Parallel
2 

109. Sequence
2 

110. Stagger
1 

111. Delay
1 

112. Loop
3 

113. Loop - 2 (Spin)
3 

114. Giriş
1 

115. Rüzgar Türbininin Hazırlanması
5 

116. Rüzgar Türbini Animasyon İşlemleri
3 

117. Tekerlek Animasyonunun Yapılması
2 

118. Motor Gövdesi ile Tekerleklerin Birleştirilmesi
6 

119. Motor Gövdesi Animasyonu
4 

120. Motor Animasyonu
5 

121. Componentlerin Birleştirilmesi
6 

122. Kurulum
8 

123. Region
4 

124. Markers
5 

125. Markers: Custom Markers
2 

126. Markers: Animated Markers
5 

127. Simulator - Shows User Location - Permission
6 

128. Aktif Konumu Almak (getCurrentPosition)
9 

129. Giriş
1 

130. Google Places API ve Android Permissions
2 

131. getCurrentPosition
3 

132. Map Component'inin Geliştirilmesi
1 

133. Google Places Nearby API
6 

134. Yakınlari Mekanlara Pin Eklemek
3 

135. Places Component'inin Geliştirilmesi - 1
6 

136. Places Component'inin Geliştirilmesi - 2
4 

137. Places Component'inin Geliştirilmesi - 3
5 

138. Animate to Region
4 

139. NativeBase Giriş
2 

140. NativeBase Kurulum
1 

141. Signup Form
2 

142. Formik ile Mutlu Formlar
4 

143. Yup ile Validasyon İşlemleri - 1
3 

144. Yup ile Validasyon İşlemleri - 2
2 

145. Yup ile Validasyon İşlemleri - 3
3 

146. Backend API Simulasyonu
7 

147. Real World Folder Structure
6 

148. Nedir
4 

149. Kurulum
1 

150. @observable ve @observer Tanımları
6 

151. @action Tanımı Neden Gerekli ?
5 

152. enforceActions
1 

153. @computed Tanımı
2 

154. autorun Methodu
3 

155. reaction Methodu
3 

156. when Methodu
1 

157. Provider ve Inject Tanımları
6 

158. runInAction - Async Actions (1)
2 

159. Web Servis Çağrımı Yapmak - Async Actions (2)
9 

160. Inline Method - Async Actions (3)
2 

161. Catch Block - Async Actions (4)
1 

162. async / await - Async Actions (5)
2 

163. Activity Indicator - Async Actions (6)
2 

164. Error Messages - Async Actions (7)
2 

165. Uygulama Tanıtımı
4 

166. API Tanıtımı
2 

167. React Navigation Kurulumu
2 

168. Auth Stack
8 

169. Signup Formunun Hazırlanması
6 

170. Signin Formunun Hazırlanması
2 

171. MobX Kurulumu
5 

172. Register İşlemleri
6 

173. Login İşlemleri
4 

174. Auth Store - Save Token
3 

175. Navigation Service
2 

176. Auth Redirect - 1
5 

177. Auth Redirect - 2
4 

178. Logout İşlemleri
4 

179. Anasayfa Listeleme İşlemleri
4 

180. MobX Movie Store
7 

181. Spinner
1 

182. Detay Ekranının Hazırlanması
4 

183. Giriş ve Kurulum
8 

184. Online Kullanıcı Sayısını Göstermek
6 

185. Real-time Background Değişimi Yapmak - 1
7 

186. Real-time Background Değişimi Yapmak - 2
1 

187. Giriş
3 

188. Local Notification Kurulumu
11 

189. Bildirim Detayları
2 

190. Remote Notifications - IOS
12 

191. Remote Notifications - Android
10 

192. Custom Node.JS Backend Üzerinden Bildirim Göndermek
5 

193. Giriş
2 

194. Proje Tanıtımı [PokeApp]
1 

195. Projenin Oluşturulması
3 

196. React Navigation Kurulumu
3 

197. React Navigation Kurulumu - 2
3 

198. Apollo Clent Kurulumu
5 

199. Pokemons GraphQL Query
4 

200. Pokemonların Listelenmesi
1 

201. Liste Bileşeninin Geliştirilmesi
5 

202. Tema Tanımları ve Loading Bileşeni
4 

203. Pokemon Detay Ekranının Hazırlanması
3 

204. Detay Ekranı için GraphQL Sorgusunun Yazılması
11 

205. GraphQL Query Dosyalarının Oluşturulması
2 

206. Pokemon Etiketlerinin Gösterilmesi
8 

207. Pokemon Dönüşümlerinin Gösterilmesi
7 