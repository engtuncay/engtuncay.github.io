export class FiString {

  static cropWitDot(musTXTUNVAN: string, arg1: number) {
    return this.crop(musTXTUNVAN, arg1, '..');
  }

  public static crop(txValue: string, lnSize: number, txSuffix: string = '') {
    if (!txValue) {
      return ''
    }
    return txValue.length > lnSize ? txValue.substring(0, lnSize) + txSuffix : txValue;
  }

  public static joinComma(iskProList: any, fnValue: (item: any) => any) {
    if (!iskProList || iskProList.length === 0) return "";
    return iskProList.map(fnValue).join(", ");
  }

  public static orEmpty(value: string | undefined): string {
    if (value == undefined) return "";
    return value;
  }

  static isEmpty(ftTxKey: string) {
    return ftTxKey == undefined || ftTxKey == null || ftTxKey.trim() == "";
  }

}