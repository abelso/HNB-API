# HNB-API

This API simply returns JSON readable exchange rate data from HNB (Croatian National Bank) since HNB only offers pure text which is useless for any programming task.

## Example

```json
{
  "currency_code": "036",
  "currency": "AUD",
  "unit": 1,
  "rates": {
    "buying": 4.971377,
    "middle": 4.986336,
    "selling": 5.001295
  }
}
```

## Future plans

I intend to make a 2.0 version which will give the ability of calculating exchange rates via parameters.