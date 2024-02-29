<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Crypo Wallet App
## Features
### User Authentication:
    • New users should be able to register using their phone and password.
    • Using sanctum for API authentication, existing users should be able to request for access token.
### Multiple Crypto Support
    • The system should support multiple crypto accounts for a single user, i.e. User A will have Bitcoin balance, Litecoin balance, etc.
    • The balance for a coin should not be transferable to another coin as they are mutually exclusive.
    • Each crypto accounts of a user will have associated transactions. i.e. User A will have a record of Bitcoin transactions for their Bitcoin account, a record of Litecoin transactions for their Litecoin account, and so on.
    • You should leverage a publicly available API (such as CoinGecko, CryptoCompare, etc.) for crypto prices, to get the market price of user’s balances.
